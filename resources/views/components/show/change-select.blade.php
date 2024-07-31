@props([
    'href',
    'method',
    'name',
    'value',
    'options',
])

<div>
    <select
        name="{{ $name }}"
        data-url="{{ $href }}"
        data-method="{{ $method }}"
        class="change-select focus:shadow-outline block w-full appearance-none rounded border border-gray-400 bg-white px-2 py-1 pr-8 leading-tight shadow hover:border-gray-500 focus:outline-none"
        onchange="
        fetch(event.target.dataset.url, {
            method: event.target.dataset.method,
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name=\'csrf-token\']').getAttribute('content'),
            },
            body: JSON.stringify({ [event.target.name]: event.target.value }),
        })
            .then(response => response.json())
            .then(data => {
                console.log(data);
            })
            .catch(error => {
                console.error('Error:', error);
            });
    "
    >
        @foreach ($options as $option)
            <option
                value="{{ $option['value'] }}"
                {{ $option['value'] == $value ? 'selected' : '' }}
            >
                {{ $option['label'] }}
            </option>
        @endforeach
    </select>
</div>