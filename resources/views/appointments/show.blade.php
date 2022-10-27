@extends('../layout/' . $layout)
@section('subcontent')























































 <!-- BEGIN: Profile Info -->
    <div class="intro-y box px-5 pt-5 mt-5">
        <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
          
            <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
                <div class="font-medium text-center lg:text-left lg:mt-3">Rendez-Vous Details</div>
                <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                 
                    <div class="truncate sm:whitespace-normal flex items-center mt-3">
                        Rendez-Vous Avec Mr/Mdme : {{ $appointments->with }}
                    </div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3">
                    Pour Mr/Mdme : {{ $appointments->for }}
                    </div>

                    <div class="truncate sm:whitespace-normal flex items-center mt-3">
                        Le : {{ $appointments->date }}
                        </div>

                        <div class="truncate sm:whitespace-normal flex items-center mt-3">
                            Raison : {{ $appointments->reason }}
                            </div>

                </div>
            </div>
            
        </div>
     
    </div>
    <!-- END: Profile Info -->




<br><br><br>








<!--  ////////////////////////////////////////////////////////////////////////////////////////////////////////   -->
 












  




















@endsection