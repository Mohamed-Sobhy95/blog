 @if (session()->has('success'))
     <div class="fixed right-0 bottom-3 bg-blue-600 text-white text-sm py-4 px-3 rounded-xl" x-data="{show:true}"
         x-init="setTimeout(()=>show=false,4000)" x-show="show">


         {{ session()->get('success') }}
     </div>

 @endif
