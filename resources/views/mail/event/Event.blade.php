<x-mail::message>

#### Dear {{ $user->name }}
#### Your event has been registered correctly
_____

### Title : {{ $event->title }}
### Price : ${{$event->price}}
### Body : {{ $event->body }}


Thanks,<br>
{{ __('resturantly') }}
</x-mail::message>
