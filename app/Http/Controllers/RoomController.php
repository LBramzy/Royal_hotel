<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\AddRoom;
use App\Http\Requests\UpdateRoom;
use Illuminate\Support\Facades\DB;
use App\Models\Room;
use App\Models\RoomImages;
use App\Models\RoomFeature;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    public function rooms(){
        return view("rooms.room");
    }

    public function view_room(Room $room){
        $room = $room->load('room_images_relation');
        return view("rooms.view_room", [
            "room" => $room,
        ]);
    }

    public function add_room(AddRoom $request): JsonResponse
    {
        DB::beginTransaction();

        // Importing Database class;
        $room = new Room;
        $room_feature = new RoomFeature;

        try{
            $data=$request->validated();

            $room->room_name = $data["room_name"];
            $room->room_number = $data["room_number"];
            $room->room_price = $data["room_price"];
            $room->room_number_of_beds = $data["room_number_of_beds"];

            $room->save();

            $roomID = $room->id;

            $room_feature->room_id = $roomID;
            $room_feature->wifi = $data["wifi"];
            $room_feature->air_conditioning = $data["air_conditioning"];
            $room_feature->smart_tv = $data["smart_tv"];
            $room_feature->complementary_breakfast = $data["complementary_breakfast"];
            $room_feature->daily_housekeeping = $data["daily_housekeeping"];
            $room_feature->work_desk = $data["work_desk"];
            $room_feature->room_service = $data["room_service"];
            $room_feature->pool_access = $data["pool_access"];

            $room_feature->save();


            if($request->hasFile("room_images")){
                foreach ($request->file('room_images') as $image) {

                    $image_path = $image->store('room_images', 'public');

                    RoomImages::create([
                        'room_id' => $roomID,
                        'image_path' => $image_path
                    ]);

                }
            }

            DB::commit();

            // php artisan storage:link

            return response()->json([
                'status' => 'success',
                'message' => 'Valid',
                'redirect' => '/landlord',
            ]);

        }catch(\Throwable $e){

            DB::rollback();

            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
            // dd("Wrong Validation");
        }
    }

    public function show_update_room(Room $room){
        $room = $room->load('room_images_relation');
        return view('rooms.update_room',[
            'room' => $room,
        ]);
    }

    public function update_room(UpdateRoom $request, Room $room) {

        $validated = $request->validated();
        $room->update($validated);

        $room->room_features_relation()->update([
            'wifi' => $request->input('wifi', 0),
            'air_conditioning' => $request->input('air_conditioning', 0),
            'smart_tv' => $request->input('smart_tv', 0),
            'complementary_breakfast' => $request->input('complementary_breakfast', 0),
            'daily_housekeeping' => $request->input('daily_housekeeping', 0),
            'work_desk' => $request->input('work_desk', 0),
            'room_service' => $request->input('room_service', 0),
            'pool_access' => $request->input('pool_access', 0),
        ]);



        // Delete images the user removed in the UI
        if ($request->filled('deleted_image_ids')) {
            $imagesToDelete = $room->room_images_relation()
                ->whereIn('id', $request->input('deleted_image_ids'))
                ->get();

            foreach ($imagesToDelete as $image) {
                Storage::disk('public')->delete($image->image_path);
                $image->delete();
            }
        }

        // Store newly uploaded images
        if ($request->hasFile('room_images')) {
            foreach ($request->file('room_images') as $file) {
                $image_path = $file->store('rooms', 'public');

                $room->room_images_relation()->create([
                    'image_path' => $image_path,
                ]);
            }
        }

        return redirect()
        ->route('rooms')
        ->with('success', "Room {$room->room_number} updated successfully.");
    }

    public function destroy(Room $room){

        // Block deleting a room that's currently booked
        if ($room->isCurrentlyBooked()) {
            return back()->with('error', "Room is currently occupied by a guest and cannot be deleted until the booking ends.");
        }

        DB::transaction(function () use ($room) {

            //  Delete the actual image files from disk
            foreach ($room->room_images_relation as $image) {
                if ($image->image_path && Storage::disk('public')->exists($image->image_path)) {
                    Storage::disk('public')->delete($image->image_path);
                }
            }

            //  Delete the RoomImage rows from the database
            $room->room_images_relation()->delete();

            //  Delete the Room row itself
            $room->delete();
        });

        return redirect()
            ->route('dashboard.admin')
            ->with('success', 'Room and all associated images deleted successfully.');
    }
}
