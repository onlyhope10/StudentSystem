@if(session()->has('message'))

<div x-data="{show:true}" x-show="show" x-init="setTimeout(()=> show = false, 4000)" class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
  <p class="font-bold">Message Alert!</p>
  <p>{{session('message')}}</p>
</div>

@endif