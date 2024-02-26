<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>request Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <style>
        /* CSS for the hidden form */
        #requestForm {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(240, 240, 240, 0.9); /* Grey with transparency */
            bottom-padding: 40px;
            border: 1px solid #ccc;
            z-index: 9999;
        }
    </style>
</head>
<body>

    <!-- Add Request Button -->
    <div class="block space-y-4 md:flex md:space-y-0 md:space-x-4 md:rtl:space-x-reverse">
        <!-- Modal toggle -->
        <button id="addRequestBtn" class="block w-full md:w-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Add Request</button>
    </div>

    <!-- Bottom Right Modal -->
    <div id="bottom-right-modal" data-modal-placement="bottom-right" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                
                <!-- Modal body -->
                <form id="newRequestForm" method="post" action="#" style="width:80%; margin:0 auto;">
                    @csrf <!-- CSRF token (not needed since it's not a Laravel application) -->
                    <div>
                      <label for="email" class="mb-5 text-sm text-gray-900 text-white">To</label>
                      <input type="email" id="email" name="email" value="" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter your email" required />
                      @error('email')
                          <span class="text-red-800">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="flex mb-5">
                        <div class="w-1/2 mr-2">
                            <label for="request_title" class="text-sm text-gray-900 text-white">Title</label>
                            <input type="text" id="request_title" name="requset_title" value="" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write title here..." required />
                            @error('request_title')
                                <span class="text-red-800">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-1/2 ml-2">
                            <label for="date" class="text-sm text-gray-900 text-white">Date</label>
                            <input type="date" id="date" name="date" value="" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                            @error('date')
                                <span class="text-red-800">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="contentInput" class="mb-5 text-sm text-gray-900 text-white">Content</label>
                        <textarea id="contentInput" rows="4" class="border border-gray-300 p-2.5 w-full text-sm text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write content here..." name="content"></textarea>
                        @error('content')
                            <span class="text-red-800">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <label class="text-sm font-medium text-gray-900 text-white" for="user_avatar">Attachments</label>
                    <input class="w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Send</button>
                </form>
            </div>
        </div>
    </div>

    <div class="mt-8">
      
      <div class="flex flex-wrap grid-cols-3 gap-4">
        @if (count($previousRequests) > 0)
        <h2 class="text-lg font-semibold mb-4">Previous Requests</h2>
         @foreach($previousRequests as $request)
          <p>title</p>{{ $request->request_title }}
         @endforeach
          @else 
             <p>no request</p>
            @endif
        </div>
      </div>
    </div>
    
    
    

     
    <script>
        document.getElementById("addRequestBtn").addEventListener("click", function() {
            document.getElementById("bottom-right-modal").classList.remove("hidden");
        });
        document.querySelectorAll("[data-modal-hide]").forEach(item => {
            item.addEventListener("click", function() {
                document.getElementById("bottom-right-modal").classList.add("hidden");
            });
        });</script>
    
 
</body>
</html>