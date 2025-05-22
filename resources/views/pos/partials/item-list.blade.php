@foreach ($items as $item)
    <label>
        <input type="radio" name="selected_item" value="{{ $item['name'] }}" data-price="{{ $item['price'] }}">
        {{ $item['name'] }} - PHP {{ number_format($item['price'], 2) }}
    </label>
@endforeach
