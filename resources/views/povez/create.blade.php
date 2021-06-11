@extends('layouts.layout')
@section('content')

<section class="w-screen h-screen pl-[80px] pb-4 text-gray-700">
            <!-- Heading of content -->
            <div class="heading">
                <div class="flex border-b-[1px] border-[#e4dfdf]">
                    <div class="pl-[30px] py-[10px] flex flex-col">
                        <div>
                            <h1>
                                Novi povez
                            </h1>
                        </div>
                        <div>
                            <nav class="w-full rounded">
                                <ol class="flex list-reset">
                                <li>
                                        <a href="{{route('polisa.index')}}" class="text-[#2196f3] hover:text-blue-600">
                                            Settings
                                        </a>
                                    </li>
                                    <li>
                                        <span class="mx-2">/</span>
                                    </li>
                                    <li>
                                        <a href="{{route('povez.index')}}" class="text-[#2196f3] hover:text-blue-600">
                                            Povezi
                                        </a>
                                    </li>
                                    <li>
                                        <span class="mx-2">/</span>
                                    </li>
                                    <li>
                                        <a href="" class="text-gray-400 hover:text-blue-600">
                                            Novi povez
                                        </a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Space for content -->
            <div class="scroll height-content section-content">
                <form method="post" action="{{route('povez.store')}}" class="text-gray-700 forma" onsubmit="validacijaPovez(event)">
                @csrf 
                    <div class="flex flex-row ml-[30px]">
                        <div class="w-[50%] mb-[150px]">
                            <div class="mt-[20px]">
                                <p>Naziv poveza <span class="text-red-500">*</span></p>
                                <input type="text" name="Naziv" id="nazivPovez" class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" onkeydown="clearErrorsNazivPovez()"/>
                                @error('Naziv')@php echo "Naziv poveza je obavezno polje"; @endphp @enderror
                                <div id="validateNazivPovez"></div>
                            </div>
                        </div> 
                    </div>
                    <div class="absolute bottom-0 w-full">
                        <div class="flex flex-row">
                            <div class="inline-block w-full text-white text-right py-[7px] mr-[100px]">
                                <button type="button" 
                                    class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                    <a href= "{{route('povez.index')}}"> Poništi <i class="fas fa-times ml-[4px]"></i></a>
                                </button>
                                <button id="sacuvajPovez" type="submit"
                                    class="btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]">
                                    Sačuvaj <i class="fas fa-check ml-[4px]"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>

@endsection