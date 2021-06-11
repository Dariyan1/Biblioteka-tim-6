@extends('layouts.layout')

@section('content')

 <!-- Content -->
 <section class="w-screen h-screen pl-[80px] pb-4 text-gray-700">
            <!-- Heading of content -->
            <div class="heading">
                <div class="flex border-b-[1px] border-[#e4dfdf]">
                    <div class="pl-[30px] py-[10px] flex flex-col">
                        <div>
                            <h1>
                                Izmijeni podatke
                            </h1>
                        </div>
                        <div>
                            <nav class="w-full rounded">
                                <ol class="flex list-reset">
                                    <li>
                                        <a href="{{route('polisa.index')}}" class="text-[#2196f3] hover:text-blue-600">
                                            Polisa
                                        </a>
                                    </li>
                                    <li>
                                        <span class="mx-2">/</span>
                                    </li>
                                    <li>
                                        <a href="{{route('kategorije.index')}}" class="text-[#2196f3] hover:text-blue-600">
                                            Kategorije
                                        </a>
                                    </li>
                                    <li>
                                        <span class="mx-2">/</span>
                                    </li>
                                    <li>
                                        <a href="#" class="text-gray-400 hover:text-blue-600">
                                            Izmijeni podatke
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
                <form method="post" action="{{route('kategorije.update',$kategorije->id)}}" class="text-gray-700 forma" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="flex flex-row ml-[30px]">
                        <div class="w-[50%] mb-[100px]">
                            <div class="mt-[20px]">
                                <p>Naziv kategorije <span class="text-red-500">*</span></p>
                                <input type="text" name="Naziv" id="nazivKategorijeEdit" value="{{$kategorije->Naziv}}"
                                    class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                                    onkeydown="clearErrorsNazivKategorijeEdit()" />
                                <div id="validateNazivKategorijeEdit"></div>
                            </div>

                            <div class="mt-[20px]">
                                <p>Uploaduj ikonicu </p>
                                <div id="empty-cover-art-ikonica"
                                    class="flex w-[90%] mt-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]">
                                    <div class="bg-gray-300 h-[40px] w-[102px] px-[20px] pt-[10px]">
                                        <label class="cursor-pointer">
                                            <p class="leading-normal">Browse...</p>
                                            <input id="icon-upload" type='file' class="hidden"  name="ikonica"
                                                :accept="accept" />
                                        </label>
                                    </div>
                                    <div id="icon-output" class="h-[40px] px-[20px] pt-[7px]"> 

                                    <?php                           
                                    $temp = explode('/',$kategorije->Ikonica);
                                    $naziv = $temp[count($temp)-1];
                                    echo $naziv;
                                    ?> 

                                    </div>
                                </div>
                            </div>
                            <div class="mt-[20px]">
                                <p class="inline-block">Opis</p>
                                <textarea name="Opis" rows="10" value="{{$kategorije->Opis}}"
                                    class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"> </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="absolute bottom-0 w-full">
                        <div class="flex flex-row">
                            <div class="inline-block w-full text-white text-right py-[7px] mr-[100px]">
                                <button type="button"
                                    class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                    <a href="{{route('kategorije.index')}}">Ponisti <i class="fas fa-times ml-[4px]"></i></a>
                                </button>
                                <button id="sacuvajKategorijuEdit" type="submit"
                                    class="btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]"
                                    onclick="validacijaKategorijaEdit()">
                                    Sačuvaj<i class="fas fa-check ml-[4px]"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- End Content -->

@endsection