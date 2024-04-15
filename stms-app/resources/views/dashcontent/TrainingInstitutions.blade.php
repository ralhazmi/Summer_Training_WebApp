<!-- form for add question and Recommendations -->
<div class="flex justify-end rounded-md ">
<div class="block space-y-4 md:flex md:space-y-0 md:space-x-4 rtl:space-x-reverse">
    @if ($user->role == 2)
    <button data-modal-target="medium-modal" data-modal-toggle="medium-modal" class="transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 block w-full md:w-auto text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button" >
    Add Recommendations
    </button>
    @endif
</div>
</div>
<!--Add Recommendations-->
<div id="medium-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-lg max-h-full">
        <div class="relative bg-white rounded-lg shadow ">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-medium "style="color:#00519B;">
                + Add Recommendations
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="medium-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 md:p-5 space-y-4">
                <form class="max-w-md mx-auto"  method="post" action="{{route('storeR')}}">
                    @csrf
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-5 group">
                         <input type="text" name="company_name" id="company_name" class="block py-2.5 px-0 w-full text-sm  bg-transparent border-0 border-b-2 border-gray-300 appearance-none   focus:outline-none focus:ring-0 focus:border-blue-600 peer"style="color:#00519B;" placeholder=" " required />
                         <label for="company_name" value="{{old('company_name')}}" class="peer-focus:font-medium absolute text-sm  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"style="color:#00519B;">company name</label>
                         </div>
                         <div class="relative z-0 w-full mb-5 group">
                            <input type="email" name="address" id="address" class="block py-2.5 px-0 w-full text-sm  bg-transparent border-0 border-b-2 border-gray-300 appearance-none   focus:outline-none focus:ring-0 focus:border-blue-600 peer"style="color:#00519B;" placeholder=" " required />
                            <label for="address"  value="{{old('address')}}" class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 -blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"style="color:#00519B;">Email address</label>
                         </div>
                        </div>
                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="tel"  name="company_number" id="company_number" class="block py-2.5 px-0 w-full text-sm  bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer"style="color:#00519B;" placeholder=" " required />
                                <label for="company_number" value="{{old('company_number')}}" class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus: peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"style="color:#00519B;">Phone number (05********)</label>
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                 <input type="text" name="company_website" id="company_website" class="block py-2.5 px-0 w-full text-sm  bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer"style="color:#00519B;" placeholder=" " required />
                                 <label for="company_website" value="{{old('company_website')}}" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus: peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"style="color:#00519B;">Company (Ex. Google)</label>
                                </div>
                            </div>
                            <button type="submit" class="cursor-progress text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<!--show recommendation-->
<p class="text-lg font-semibold mb-4  "style="color:#00519B;">Recommendations of Summer Training</p>
@if (count($Training) > 0)
<div class="flex flex-wrap">
    <div id="trainingCards" class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @foreach($Training as $index => $Training)
        <div class="p-2 training-card aspect-w-1 aspect-h-1">
            <div class="bg-white shadow rounded-lg p-5">
                <div class="flex items-center justify-between w-full">
                    <address class="w-full relative bg-gray-50 p-4 rounded-lg border border-gray-200 not-italic grid grid-cols-2">
                        <div class="space-y-2 text-blue-900 leading-loose hidden sm:block">
                            Name of company <br />
                            Email of company <br />
                            Phone Number <br/>
                            Website of company
                        </div>
                        <div id="contact-details-{{$index}}" class="space-y-2 text-blue-900 font-medium leading-loose">
                            {{$Training->company_name}} <br />
                            {{$Training->address}}<br />
                            {{$Training->company_number}}<br/>
                            <a href="{{$Training->company_website}}" class="font-medium text-blue-700 hover:underline"> {{ Str::limit($Training->company_website, 15) }}</a>
                        </div>
                    </address>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="flex justify-left mt-4 w-full">
        <button id="toggleBtn" data-show="more" data-text-more="Show More" data-text-less="Show Less" data-total="{{$Training->count()}}" class="bg-blue-900 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded">
            Show More
        </button>
    </div>
</div>

<style>
    .training-card {
        /* تعديل المسافة بين الكروت */
        margin-bottom: 1rem;
    }
    @media (min-width: 768px) {
        /* تعديل المسافة بين الكروت في الصفحات الكبيرة */
        .training-card {
            margin-bottom: 1.5rem;
        }
    }
</style>

<script>
    const toggleBtn = document.getElementById('toggleBtn');
    const trainingCards = document.querySelectorAll('.training-card');
    const totalCards = parseInt(toggleBtn.getAttribute('data-total'));
    let cardsToShow = 4; // عدد الكروت المعروضة في البداية

    // إخفاء الزر إذا كانت عدد الكروت أقل من أو يساوي 4
    if (totalCards <= cardsToShow) {
        toggleBtn.style.display = 'none';
    }

    // إخفاء الكروت الإضافية في البداية
    for (let i = cardsToShow; i < totalCards; i++) {
        trainingCards[i].classList.add('hidden');
    }

    toggleBtn.addEventListener('click', () => {
        const show = toggleBtn.getAttribute('data-show');
        if (show === 'more') {
            for (let i = cardsToShow; i < totalCards; i++) {
                trainingCards[i].classList.remove('hidden');
            }
            toggleBtn.textContent = toggleBtn.getAttribute('data-text-less');
            toggleBtn.setAttribute('data-show', 'less');
        } else {
            for (let i = cardsToShow; i < totalCards; i++) {
                trainingCards[i].classList.add('hidden');
            }
            toggleBtn.textContent = toggleBtn.getAttribute('data-text-more');
            toggleBtn.setAttribute('data-show', 'more');
        }
    });
</script>

@else
<p class="font-normal text-blue-800 text-blue-500"> There are currently no Recommendations loaded!.</p>
@endif
 

<script>
document.addEventListener("DOMContentLoaded", function() {
    const copyBtns = document.querySelectorAll('.copy-btn');

    copyBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const targetId = btn.getAttribute('data-copy-to-clipboard-target');
            const target = document.getElementById(targetId);
            const content = target.textContent || target.innerText;

            navigator.clipboard.writeText(content)
                .then(() => {
                    const tooltipId = btn.getAttribute('data-tooltip-target');
                    const tooltip = document.getElementById(tooltipId);
                    const successMsgId = btn.getAttribute('data-copy-to-clipboard-success-message-target');
                    const successMsg = document.getElementById(successMsgId);

                    tooltip.textContent = 'Copied!';
                    tooltip.classList.remove('invisible');
                    tooltip.classList.add('visible');

                    setTimeout(() => {
                        tooltip.textContent = 'Copy to clipboard';
                        tooltip.classList.remove('visible');
                        tooltip.classList.add('invisible');
                    }, 2000);
                })
                .catch(err => console.error('Failed to copy:', err));
        });
    });
});
</script>
