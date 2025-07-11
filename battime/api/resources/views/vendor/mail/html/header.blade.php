@props(['url'])
<tr>
    <td class="header">
        <a href="" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
                <img src="https://media.discordapp.net/attachments/994685113390608464/1188097875813605406/image.png?ex=6599495f&is=6586d45f&hm=9594f0125bd6a68becc27094b6206e627f6425f7bc608fe9c9e945b986a7eac6&=&format=webp&quality=lossless" class="logo" alt="Battime Logo">
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
