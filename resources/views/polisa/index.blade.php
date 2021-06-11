@extends('layouts.layout')
@section('content')

<!-- Content -->
<section class="w-screen h-screen pl-[80px] py-4 text-gray-700">
            <!-- Heading of content -->
            <div class="heading mt-[7px]">
                <div class="border-b-[1px] border-[#e4dfdf]">
                    <div class="pl-[30px] pb-[21px]">
                        <h1>
                            Settings
                        </h1>
                    </div>
                </div>
            </div>
            <div class="py-4 text-gray-500 border-b-[1px] border-[#e4dfdf] pl-[30px]">
                 @include('settings.meni')
            </div>
            <div class="height-ucenikProfile pb-[30px] scroll">
                <!-- Space for content -->
                <div class="section- mt-[20px]">
                    <div class="flex flex-col">
                        
                        <form action="{{route('polisa.store')}}" method="post">
                        @csrf
                        <div class="pl-[30px] flex border-b-[1px] border-[#e4dfdf]  pb-[20px]">
                        
                            <div>
                                <h3>
                                    Rok za rezervaciju
                                </h3>
                                <p class="pt-[15px] max-w-[400px]">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum eligendi nihil, vel
                                    necessitatibus saepe laboriosam! Perspiciatis laboriosam culpa veritatis ea
                                    voluptatum commodi tempora unde, dolorum debitis quia id dicta vitae.
                                </p>
                            </div>
                            <div class="relative flex ml-[60px] mt-[20px]">
                                <input type="text" name="ROK_ZA_REZERVACIJU"
                                   @if(isset($Globalnavarijabla['ROK_ZA_REZERVACIJU'])) value="{{$Globalnavarijabla['ROK_ZA_REZERVACIJU']->vrijednost}}"@endif
                                    class="h-[50px] flex-1 w-full px-4 py-2 text-sm text-gray-700 placeholder-gray-400 bg-white border-[1px]  border-[#e4dfdf]  rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                                    placeholder="..." />
                                <p class="ml-[10px] mt-[10px]">dana</p>
                            </div>
                        </div>
                        <div class="pl-[30px] flex border-b-[1px] border-[#e4dfdf]  py-[20px]">
                            <div>
                                <h3>
                                    Rok vraćanja
                                </h3>
                                <p class="pt-[15px] max-w-[400px]">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum eligendi nihil, vel
                                    necessitatibus saepe laboriosam! Perspiciatis laboriosam culpa veritatis ea
                                    voluptatum commodi tempora unde, dolorum debitis quia id dicta vitae.
                                </p>
                            </div>
                            <div class="relative flex ml-[60px] mt-[20px]">
                                <input type="text" name="ROK_VRACANJA" 
                                   @if(isset($Globalnavarijabla['ROK_VRACANJA'])) value="{{$Globalnavarijabla['ROK_VRACANJA']->vrijednost}}" @endif
                                    class="h-[50px] flex-1 w-full px-4 py-2 text-sm text-gray-700 placeholder-gray-400 bg-white border-[1px]  border-[#e4dfdf]  rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                                    placeholder="..." />
                                <p class="ml-[10px] mt-[10px]">dana</p>
                            </div>
                        </div>
                        <div class="pl-[30px] flex border-b-[1px] border-[#e4dfdf]  py-[20px]">
                            <div>
                                <h3>
                                    Rok konflikta
                                </h3>
                                <p class="pt-[15px] max-w-[400px]">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum eligendi nihil, vel
                                    necessitatibus saepe laboriosam! Perspiciatis laboriosam culpa veritatis ea
                                    voluptatum commodi tempora unde, dolorum debitis quia id dicta vitae.
                                </p>
                            </div>
                            <div class="relative flex ml-[60px] mt-[20px]">
                                <input type="text" name="ROK_KONFLIKTA" 
                                   @if(isset($Globalnavarijabla['ROK_KONFLIKTA'])) value="{{$Globalnavarijabla['ROK_KONFLIKTA']->vrijednost}}" @endif
                                    class="h-[50px] flex-1 w-full px-4 py-2 text-sm text-gray-700 placeholder-gray-400 bg-white border-[1px]  border-[#e4dfdf]  rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                                    placeholder="..." />
                                <p class="ml-[10px] mt-[10px]">dana</p>
                            </div>
                        </div>

                       


                        <div class="pl-[30px] flex border-b-[1px] border-[#e4dfdf]  py-[20px]">
                            <div style="flex:2;">
                                
                            </div>
                            <div style="flex:1.5;" class="relative flex ml-[60px] mt-[20px]">
                                
                            </div>
                            <div style="flex:1;">

                             <button id="sacuvajZanr" type="submit"
                            class=" btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50] md:object-right">
                            Sačuvaj <i class="fas fa-check ml-[4px]"></i>
                        </button>
                            </div>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Content -->

@endsection