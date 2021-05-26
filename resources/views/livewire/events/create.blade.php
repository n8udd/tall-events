<div class="w-full">
  @if ($errors->any())
  <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <form action="{{ route('events.store') }}" method="post" class="w-full pt-8">
    @csrf

    {{-- first block --}}
    <div class="flex flex-col md:flex-row w-full">

      {{-- blurb left panel --}}
      <aside class="px-4 sm:px-0 md:w-1/3 mb-2">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Blurb</h3>
        <p class="mt-1 text-sm text-gray-600">
          Info about the event
        </p>
      </aside>
      {{-- end blurb left panel --}}

      {{-- blurb right panel --}}
      <section class="md:w-2/3 flex">
        <div class="flex flex-col  px-4 py-5 bg-white sm:p-6 w-full">

          <div class="flex flex-col w-full">
            <label for="title" class="block text-sm font-medium text-gray-500">
              <span class="text-red-500 mr-1">*</span>Title:
            </label>
            <input type="text" name="title" id="title" maxlength="50" placeholder="title..." value="{{ old('title') }}"
              class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:text-gray-900"
              required>
          </div>

          <div class="flex flex-col mt-6">
            <label for=" intro" class="block text-sm font-medium text-gray-500">
              <span class="text-red-500 mr-1">*</span>Intro:
            </label>
            <div x-data="{ count: 0 }" x-init="count = $refs.count_intro.value.length">
              <textarea id="intro" name="intro" rows="2"
                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 dark:text-gray-900"
                placeholder="intro..." rows="3" maxlength="240" x-ref="count_intro"
                x-on:keyup="count = $refs.count_intro.value.length" required>{{ old('intro') }}</textarea>
              <div class="flex justify-between">
                <p class="mt-2 text-sm text-gray-300">
                  A short explainer of the event <br>(max 240 characters).
                </p>
                <div class="mt-2 text-sm text-gray-300">
                  <span x-html="count"></span> / <span x-html="$refs.count_intro.maxLength"></span>
                </div>
              </div>
            </div>
          </div>

          <div class="flex flex-col mt-6">
            <label for="description" class="block text-sm font-medium text-gray-500">
              <span class="text-red-500 mr-1">*</span>Description:
            </label>
            <div x-data="{ count: 0 }" x-init="count = $refs.count_desc.value.length">
              <div class="mt-1">
                <textarea id="description" name="description" rows="5"
                  class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 dark:text-gray-900"
                  placeholder="description..." rows="3" maxlength="1000" x-ref="count_desc"
                  x-on:keyup="count = $refs.count_desc.value.length" required>{{ old('description') }}</textarea>
              </div>
              <div class="items-end">
                <div class="mt-2 text-sm text-gray-300">
                  <span x-html="count"></span> / <span x-html="$refs.count_desc.maxLength"></span>
                </div>
              </div>
            </div>
          </div>

        </div>
      </section>
      {{-- end blurb right panel --}}

    </div>


    <div class="" aria-hidden="true">
      <div class="py-8">
        <div class="border-t border-gray-200"></div>
      </div>
    </div>

    <div class="flex flex-col md:flex-row w-full">

      {{-- blurb left panel --}}
      <aside class="px-4 sm:px-0 md:w-1/3 mb-2">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Event Options</h3>
        <p class="mt-1 text-sm text-gray-600">
          Difficulty, Type etc...
        </p>
      </aside>
      {{-- end blurb left panel --}}

      {{-- blurb right panel --}}
      <section class="md:w-2/3 flex">
        <div class="flex flex-col px-4 py-5 bg-white sm:p-6 w-full">

          {{-- difficulty/level --}}
          <div class="flex flex-row w-full space-x-6">
            <div class="flex flex-col w-1/2">
              <h4 for="level_id" class="block text-sm font-medium text-gray-500"><span
                  class="text-red-500 mr-1">*</span>Difficulty:</h4>
              <select name="level_id" id="level_id"
                class="w-100 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300  dark:text-gray-900"
                required>
                @foreach ($levels as $level)
                <option value="{{$level->id}}" class="dark:text-black">{{ucfirst($level->name)}}</option>
                @endforeach
              </select>
            </div>

            <div class="flex flex-col w-1/2">
              <h4 for="type_id" class="block text-sm font-medium text-gray-500"><span
                  class="text-red-500 mr-1">*</span>Type:
              </h4>
              <select name="type_id" id="type_id"
                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300  dark:text-gray-900"
                required>
                @foreach ($types as $type)
                <option value="{{$type->id}}">{{ucfirst($type->name)}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="flex flex-col mt-6 ml-2">
            <h4 class="block text-sm font-medium text-gray-500"><span class="text-red-500 mr-1">*</span>
              Leader Led:
            </h4>
            <div class="flex flex-row">
              <div class="flex">
                <label class="inline-flex items-center my-2 mr-16">
                  <input type="radio" class="form-radio h-6 w-6 ml-6 md:ml-0 text-blue-400" name="leader_led" value="1"
                    required>
                  <span class="ml-2 text-gray-500">Yes</span>
                </label>
              </div>
              <div class="flex">
                <label class="inline-flex items-center my-2">
                  <input type="radio" class="form-radio h-6 w-6 ml-6 text-red-400" name="leader_led" value="0" required>
                  <span class="ml-2 text-gray-500">No</span>
                </label>
              </div>
            </div>
          </div>

          <div class="flex flex-col mt-6 ml-2">
            <h4 class="block text-sm font-medium text-gray-500"><span class="text-red-500 mr-1">*</span>
              Gender:
            </h4>
            <div class="flex flex-col md:flex-row">
              <div class="flex">
                <label class="inline-flex items-center my-2 mr-16">
                  <input type="radio" class="form-radio h-6 w-6 ml-6 md:ml-0 text-green-400" name="gender" value="mixed"
                    required>
                  <span class="ml-2 text-gray-500" required>Mixed</span>
                </label>
              </div>
              <div class="flex">
                <label class="inline-flex items-center my-2 mr-16">
                  <input type="radio" class="form-radio h-6 w-6 ml-6 text-pink-400" name="gender" value="ladies">
                  <span class="ml-2 text-gray-500" required>Ladies</span>
                </label>
              </div>
              <div class="flex">
                <label class="inline-flex items-center my-2 mr-16">
                  <input type="radio" class="form-radio h-6 w-6 ml-6" name="gender" value="gents">
                  <span class="ml-2 text-gray-500" required>Gents</span>
                </label>
              </div>
            </div>
          </div>

        </div>
      </section>
      {{-- end blurb right panel --}}

    </div>

    <div class="" aria-hidden="true">
      <div class="py-8">
        <div class="border-t border-gray-200"></div>
      </div>
    </div>

    <div class="flex flex-col md:flex-row w-full">

      {{-- blurb left panel --}}
      <aside class="px-4 sm:px-0 md:w-1/3 mb-2">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Logistics</h3>
        <p class="mt-1 text-sm text-gray-600">
          Time, date and location info
        </p>
      </aside>
      {{-- end blurb left panel --}}

      {{-- blurb right panel --}}
      <section class="md:w-2/3 flex">
        <div class="flex flex-col px-4 py-5 bg-white sm:p-6 w-full">

          {{-- difficulty/level --}}
          <div class="flex flex-row w-full space-x-6">
            <div class="flex flex-col w-1/2">
              <label for="start_date" class="block text-sm font-medium text-gray-500"><span
                  class="text-red-500 mr-1">*</span>Start
                Sate:</label>
              <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}"
                class="mt-1 font-mono focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:text-gray-900"
                required value="{{ old('start_date') }}" placeholder="dd-mm-yyyy">
            </div>

            <div class="flex flex-col w-1/2">
              <label for="start_time" class="block text-sm font-medium text-gray-500"><span
                  class="text-red-500 mr-1">*</span>Start
                Time:</label>
              <input type="time" name="start_time" id="start_time" value="{{ old('start_time') }}"
                class="mt-1 font-mono focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:text-gray-900"
                required placeholder="hh:mm">
            </div>
          </div>

          <div class="flex flex-col w-full mt-6">
            <label for="location" class="block text-sm font-medium text-gray-500"><span
                class="text-red-500 mr-1">*</span>
              Location:
            </label>
            <input type="text" name="location" id="location" maxlength="50" placeholder="location..."
              value="{{ old('location') }}"
              class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:text-gray-900"
              required>
          </div>

          <div class="flex flex-row w-full space-x-6 mt-6">
            <div class="flex flex-col w-1/2">
              <label for="min_attendees" class="block text-sm font-medium text-gray-500">Min
                Attendees
                <input type="number" name="min_attendees" id="min_attendees" value="{{ old('min_attendees') }}"
                  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:text-gray-900">
              </label>
            </div>

            <div class="flex flex-col w-1/2">
              <label for="max_attendees" class="block text-sm font-medium text-gray-500">Max
                Attendees
                <input type="number" name="max_attendees" id="max_attendees" value="{{ old('max_attendees') }}"
                  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:text-gray-900">
              </label>
            </div>
          </div>

          <div class="flex flex-col w-full mt-6">
            <label for="url" class="block text-sm font-medium text-gray-500">
              URL:
            </label>
            <div class="flex flex-row">
              <div
                class="font-mono flex content-center items-center mt-1 border border-gray-200 bg-gray-100 px-4 h-100 text-gray-400 border-r-0">
                https://</div>
              <input type="url" name="url" id="url" maxlength="50" placeholder="url..." value="{{ old('url') }}"
                class="font-mono mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300">
            </div>
          </div>

        </div>
      </section>
      {{-- end blurb right panel --}}

    </div>

    {{-- end first block --}}

    <div class="" aria-hidden="true">
      <div class="py-8">
        <div class="border-t border-gray-200"></div>
      </div>
    </div>

    <div class="w-full flex flex-row-reverse">
      <div class="px-4 py-8 bg-white text-right sm:px-6 w-full md:w-2/3 justify-end">
        <button type="submit"
          class="flex justify-center p-2 border border-transparent shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 w-full">
          Save
        </button>
      </div>
    </div>
  </form>
</div>