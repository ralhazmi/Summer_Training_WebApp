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
                <h3 class="text-xl font-medium text-blue-900">
                Add Recommendations
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
                         <input type="text" name="company_name" id="company_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none   focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                         <label for="company_name" value="{{old('company_name')}}" class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">company name</label>
                         </div>
                         <div class="relative z-0 w-full mb-5 group">
                            <input type="email" name="address" id="address" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none   focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="address"  value="{{old('address')}}" class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email address</label>
                         </div>
                        </div>
                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="tel"  name="company_number" id="company_number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="company_number" value="{{old('company_number')}}" class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus: peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Phone number (05********)</label>
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                 <input type="text" name="company_website" id="company_website" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                 <label for="company_website" value="{{old('company_website')}}" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus: peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Company (Ex. Google)</label>
                                </div>
                            </div>
                            <button type="submit" class="cursor-progress text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<!--show recommendation-->
<p class="text-lg font-semibold mb-4 text-blue-900 ">Recommendations of Summer Training</p>
@if (count($Training) > 0)
<div class="w-full max-w-md bg-white shadow rounded-lg p-5">
@foreach($Training as $index => $Trainin)
<div class="flex items-center justify-between">
    <address class="relative bg-gray-50 p-4 rounded-lg border border-gray-200 not-italic grid grid-cols-2">
        <div class="space-y-2 text-blue-900  leading-loose hidden sm:block">
            Name of company <br />
            Email of company <br />
            Phone Number <br/>
            Website of company
        </div>
        <div id="contact-details-{{$index}}" class="space-y-2 text-blue-900 font-medium leading-loose">
        {{$Trainin->company_name}} <br />
        {{$Trainin->address}}<br />
        {{$Trainin->company_number}}<br/>
       <a  href="{{$Trainin->company_website}}"class="font-medium text-blue-800 hover:underline"> {{$Trainin->company_website}}</a>
     </div>
     <button data-copy-to-clipboard-target="contact-details-{{$index}}" data-copy-to-clipboard-content-type="textContent" data-tooltip-target="tooltip-contact-details-{{$index}}" class="copy-btn absolute end-2 top-2 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg p-2 inline-flex items-center justify-center">
         <span id="default-icon-contact-details-{{$index}}">
            <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                <path d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2Zm-3 14H5a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-4H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-5H5a1 1 0 0 1 0-2h2V2h4v2h2a1 1 0 1 1 0 2Z"/>
            </svg>
        </span>
        <span id="success-icon-contact-details-{{$index}}" class="hidden inline-flex items-center">
             <svg class="w-3.5 h-3.5 text-blue-700 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
            </svg>
        </span>
    </button>
    <div id="tooltip-contact-details-{{$index}}" role="tooltip" class="tooltip absolute z-10 invisible px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 dark:bg-gray-700">
        <span id="default-tooltip-message-contact-details-{{$index}}">Copy to clipboard</span>
        <span id="success-tooltip-message-contact-details-{{$index}}" class="hidden">Copied!</span>
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>
</address>
</div>       
@endforeach
</div>
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