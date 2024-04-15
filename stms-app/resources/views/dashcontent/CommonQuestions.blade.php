<div class="flex justify-end rounded-md ">
<div class="block space-y-4 md:flex md:space-y-0 md:space-x-4 rtl:space-x-reverse">
    @if ($user->role == 2)
    <button data-modal-target="small-modal" data-modal-toggle="small-modal" class="transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 block w-full md:w-auto text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">Add question
    </button>
    @endif
</div>
</div>
<!--add questions-->
<div id="small-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-medium "style="color:#00519B;">
                 + Add question
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="small-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 md:p-5 space-y-4">
                <p class="text-base leading-relaxed text-gray-500">
                <form  method="post" action="{{route('storequestion')}}" style="width:80%; margin:0 auto;">
                @csrf
                <div >
               <label for="question" class=" mb-5 text-sm  "style="color:#00519B;">Question</label>
             <input type="text" id="question" name="question"value="{{old('question')}}" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Write question here..." required />
            </div>
          <div>
           <label for="answer" class=" text-sm   "style="color:#00519B;">Answer</label>
           <textarea id="answer" rows="3" class=" p-2.5 w-full text-sm text-gray-900  rounded-lg   border-gray-300 focus:ring-blue-500 focus:border-blue-500  "placeholder="Write answer here..."  name="answer" value="{{old('answer')}}"></textarea>
         </div>
         <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">submit</button>
              </form>
            </div>
        </div>
    </div>
</div>
<!--show the questions -->
<p class="text-lg font-semibold mb-4 "style="color:#00519B;">Common Questions</p>
@if (count($Common) > 0)
<div id="accordion-collapse" data-accordion="collapse">
@php $counter = 0; @endphp
@foreach($Common as $index => $question)
    @if($counter < 5)
        @php $counter++; @endphp
        <h2 id="accordion-collapse-heading-{{$index}}">
            <button type="button" class="text-blue-900 flex items-center justify-between w-96 p-3 font-medium rtl:text-right  border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 hover:bg-gray-100 gap-3"style="color:#00519B;" data-accordion-target="#accordion-collapse-body-{{$index}}" aria-expanded="false" aria-controls="accordion-collapse-body-{{$index}}">
                <span>{{$question->question}}</span>
                <svg data-accordion-icon class="w-4 h-4 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-{{$index}}" class="hidden" aria-labelledby="accordion-collapse-heading-{{$index}}">
            <div class="text-blue-800 p-5 border border-b-0 border-gray-200 w-96">
                <p class="mb-2 "style="color:#00519B;">{{$question->answer}}</p>
            </div>
        </div>
    @else
        <div id="hidden-questions" style="display: none;">
            <h2 id="accordion-collapse-heading-{{$index}}">
                <button type="button" class="text-blue-900 flex items-center justify-between w-96 p-3 font-medium rtl:text-right text-gray-900 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 hover:bg-gray-100 gap-3" data-accordion-target="#accordion-collapse-body-{{$index}}" aria-expanded="false" aria-controls="accordion-collapse-body-{{$index}}">
                    <span style="color:#00519B;">{{$question->question}}</span>
                    <svg data-accordion-icon class="w-4 h-4 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-{{$index}}" class="hidden" aria-labelledby="accordion-collapse-heading-{{$index}}">
                <div class="text-blue-800 p-5 border border-b-0 border-gray-200 w-96">
                    <p class="mb-2 "style="color:#00519B;">{{$question->answer}}</p>
                </div>
            </div>
        </div>
    @endif
@endforeach

<button id="showMoreBtn" class="text-blue-900 flex items-center justify-between w-96 p-3 font-medium rtl:text-right  border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 hover:bg-gray-100 gap-3 mt-4 text-blue-800 hover:underline" onclick="toggleShowMore()">Show More</button>

<script>
    let hiddenQuestions = document.getElementById('hidden-questions');
    let showMoreBtn = document.getElementById('showMoreBtn');
    let showAll = false;

    function toggleShowMore() {
        showAll = !showAll;

        if (showAll) {
            hiddenQuestions.style.display = 'block';
            showMoreBtn.textContent = 'Show Less';
        } else {
            hiddenQuestions.style.display = 'none';
            showMoreBtn.textContent = 'Show More';
        }
    }
</script>

@else
            <p class="font-normal text-blue-800 text-blue-500"> There are currently no Commen questions loaded!.</p>

@endif

