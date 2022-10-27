@extends('../layout/' . $layout)

@section('subhead')
    <title>Categories - Midone - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')




<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 40%;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
  padding: 2px 16px;
}

.center {
margin: auto;
width: 40%;
border: 5px solid #FFFF00;
padding: 10px;
}
</style>
















<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Formation</h2>

    </div>




























 <!-- BEGIN: New Order Modal -->
 <div id="new-order-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">


            <div class="container mt-4">





</div>




            </div>
        </div>
    </div>













 <!-- BEGIN: Profile Info -->
    <div class="intro-y box px-5 pt-5 mt-5">
        <div class="flex flex-col lg:flex-row border-b
border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">

        <div class="center card">
  <img  src="{{ '../../storage/imgs/'.$formations['image'] }}"
alt="Avatar" style="width:100%">
  <div class="container">
    <h3 class="text-lg font-medium mr-auto"><b> {{ $formations->nom }}</b></h3>
    <div class="truncate sm:whitespace-normal flex items-center
mt-3"><h5 class="text-lg font-medium mr-auto">Description:  </h5>
{{ $formations->description }}  </div>
    <div class="truncate sm:whitespace-normal flex items-center
mt-3"><h5 class="text-lg font-medium mr-auto">Formateur:  </h5>     {{
$formations->nom_formateur }}  </div>
</div>
</div>
            </div>
        </div>





<br><br><br>








<!--  ////////////////////////////////////////////////////////////////////////////////////////////////////////
  -->













































@endsection