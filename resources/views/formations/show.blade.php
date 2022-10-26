@extends('../layout/' . $layout)

@section('subhead')
    <title>Categories - Midone - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')





















<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Point of Sale</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
           
            <div class="pos-dropdown dropdown ml-auto sm:ml-0">
                <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                    <span class="w-5 h-5 flex items-center justify-center">
                        <i class="w-4 h-4" data-lucide="chevron-down"></i>
                    </span>
                </button>
                <div class="pos-dropdown__dropdown-menu dropdown-menu">
                    <ul class="dropdown-content">
                        <li>
                            <a href="" class="dropdown-item">
                                <i data-lucide="activity" class="w-4 h-4 mr-2"></i>
                                <span class="truncate">INV-0206020 - {{ $fakers[3]['users'][0]['name'] }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item">
                                <i data-lucide="activity" class="w-4 h-4 mr-2"></i>
                                <span class="truncate">INV-0206022 - {{ $fakers[4]['users'][0]['name'] }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item">
                                <i data-lucide="activity" class="w-4 h-4 mr-2"></i>
                                <span class="truncate">INV-0206021 - {{ $fakers[5]['users'][0]['name'] }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
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
        <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
          
            <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
                <div class="font-medium text-center lg:text-left lg:mt-3">formation Details</div>
                <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                 
                    <div class="truncate sm:whitespace-normal flex items-center mt-3">
                        Formation : {{ $formations->nom }}
                    </div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3">
                    Lieu : {{ $formations->description }}
                    </div>

                </div>
            </div>
            
        </div>
     
    </div>
    <!-- END: Profile Info -->




<br><br><br>








<!--  ////////////////////////////////////////////////////////////////////////////////////////////////////////   -->
 























  




















@endsection
