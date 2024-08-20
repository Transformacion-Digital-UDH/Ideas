@props(['colspan'])
<tr>
    <td colspan="{{ $colspan }}" class="py-4 font-medium text-gray-600 pl-3 text-base">
        {{ $slot }}
    </td>
</tr>