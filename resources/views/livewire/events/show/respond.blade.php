<div class="flex flex-row justify-center items-center my-4">
  <span class="flex mr-2">You are</span>

  {{--
    @if($this->button_disabled || $event->cancelled_at || $event->respondees->count() >= $event->max_attendees)
    disabled
    @endif
    --}} 
    <button disabled class="flex bg-red-600 px-3 py-2 text-red-200 hover:bg-red-200 hover:text-red-600 disabled:hover:bg-green-300" wire:click.prevent="toggleResponse({{ auth()->id() }})">

    @if($this->response)

      <span>Going</span>
      <svg fill=" none" viewBox="0 0 24 24" class="ml-2 h-6 w-6">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.75 12C4.75 7.99594 7.99594 4.75 12 4.75V4.75C16.0041 4.75 19.25 7.99594 19.25 12V12C19.25 16.0041 16.0041 19.25 12 19.25V19.25C7.99594 19.25 4.75 16.0041 4.75 12V12Z"></path>
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 12.75L10.1837 13.6744C10.5275 14.407 11.5536 14.4492 11.9564 13.7473L14.25 9.75"></path>
      </svg>


    @elseif(!$this->response)

      <span>Not going</span>
      <svg class="ml-2 h-6 w-6" fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.75 12C4.75 7.99594 7.99594 4.75 12 4.75V4.75C16.0041 4.75 19.25 7.99594 19.25 12V12C19.25 16.0041 16.0041 19.25 12 19.25V19.25C7.99594 19.25 4.75 16.0041 4.75 12V12Z"></path>
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 9.75L14.25 14.25"></path>
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14.25 9.75L9.75 14.25"></path>
      </svg>

    @endif
  </button>
</div>