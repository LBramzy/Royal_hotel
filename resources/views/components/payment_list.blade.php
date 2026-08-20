<tr class="border-2 border-b-black border-l-transparent border-t-transparent border-r-transparent">
    <td class="w-50 px-6 py-3 manrope text-sm">{{ $payment->transaction_id }}</td>
    <td class="w-50 text-center py-3 manrope text-sm">{{ $payment->booking_id_number }}</td>
    <td class="w-50 text-center py-3 manrope text-sm">{{ $payment->reference_number }}</td>
    <td class="w-50 text-center py-3 manrope text-sm">&#8358; {{ $payment->amount }}</td>
    <td class="w-50 text-center py-3 manrope text-sm">{{ $payment->persona_name }}</td>
    <td class="w-50 text-center py-3 manrope text-sm">{{ $payment->persona_email }}</td>
</tr>
