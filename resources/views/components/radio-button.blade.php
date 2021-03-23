@props([ 'id' => 'role', 'data' => ['user', 'admin']])

<div {{ $attributes->merge(['class' => 'flex justify-around']) }}>
    @foreach ($data as $radio)
    <div>
        <input type="radio" id="{{$radio}}" name="{{$id}}" value="{{mb_strtoupper($radio)}}">
        <label for="{{$radio}}">{{ ucfirst($radio)}}</label>
    </div>

    @endforeach
</div>