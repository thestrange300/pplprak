@extends ('layout.main')

@section('container')

<table class="table-fixed w-full min-w-full divide-y divide-gray-300 text-center">
    <thead class="bg-gray-50">
      <tr>
        <th scope="col" class="py-3.5 lg:px-4 text-center text-xs font-semibold text-gray-900">BK</th>
        @foreach ($cpl as $cpl1)
          <th scope="col" class="py-3.5 lg:px-2 text-center text-xs font-semibold text-gray-900">{{ $cpl1->kodeCPL }}          
        @endforeach
        <th scope="col" class="py-3.5 lg:px-2 text-center text-xs font-semibold text-gray-900">Simpan</th>
      </tr>
    </thead>

    <tbody class="divide-y divide-gray-200 bg-white">
      @foreach($bk as $bk1)
      <tr>
        <form action="/update/{{ $bk1->kodeBK }}" method="POST">
            @csrf
            @method('PUT')
            {{-- <td class="first-row-heading"><img src="{{ asset('assets/icons/minus.png') }}" alt="Minus"/></td> --}}
            {{-- <td class="first-row-heading"></td> --}}
            {{-- <td>{{ $loop->iteration }}</td> --}}
            <td>
              <p class="py-3.5 text-center text-xs font-semibold text-gray-900">{{ $bk1->kodeBK }}</p>
            </td>

            <?php if (in_array($bk1->kodeBK, $values)) { ?>
                @foreach (json_decode($cpl_bk, true) as $item)
                    @if ($item["kode_bk"]==$bk1->kodeBK)
                        @foreach ($cpl as $cpls)
                            <?php if (in_array($cpls->kodeCPL, explode(',', $item["pemetaan"]))) { ?>
                                <td>
                                  <div class="inline-flex items-center">
                                    <label class="relative flex cursor-pointer items-center rounded-full p-3" for="checkbox" data-ripple-dark="true">
                                      <input checked name="checkboxes[]" value="{{ $cpls->kodeCPL }}" type="checkbox" class="peer relative h-5 w-5 appearance-none rounded border border-gray-400 disabled:opacity-70 checked:border-blue-500 checked:bg-blue-500" />
                                      <div class="pointer-events-none absolute top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 text-white opacity-0 transition-opacity peer-checked:opacity-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor" stroke="currentColor" stroke-width="1">
                                          <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                      </div>
                                  </div>
                                  
                                  {{-- <input name="checkboxes[]" value="{{ $cpls->kodeCPL }}" type="checkbox" class="border-gray-300 rounded-lg h-5 w-5" checked/> --}}
                                </td>

                            <?php } else { ?>
                              <td>
                                <div class="inline-flex items-center">
                                  <label class="relative flex cursor-pointer items-center rounded-full p-3" for="checkbox" data-ripple-dark="true">
                                    <input name="checkboxes[]" value="{{ $cpls->kodeCPL }}" type="checkbox" class="peer relative h-5 w-5 appearance-none rounded border border-gray-400 disabled:opacity-70 checked:border-blue-500 checked:bg-blue-500" />
                                    <div class="pointer-events-none absolute top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 text-white opacity-0 transition-opacity peer-checked:opacity-100">
                                      <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor" stroke="currentColor" stroke-width="1">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                      </svg>
                                    </div>
                                </div>
                                
                                {{-- <input name="checkboxes[]" value="{{ $cpls->kodeCPL }}" type="checkbox" class="border-gray-300 rounded-lg h-5 w-5"/> --}}
                              </td>
                                    
                            <?php } ?>
                        @endforeach 
                    @endif
                @endforeach
                
            <?php } else { ?>
                @foreach ($cpl as $cplss)
                <td>
                  <div class="inline-flex items-center">
                    <label class="relative flex cursor-pointer items-center rounded-full p-3" for="checkbox" data-ripple-dark="true">
                      <input name="checkboxes[]" value="{{ $cplss->kodeCPL }}" type="checkbox" class="peer relative h-5 w-5 appearance-none rounded border border-gray-400 disabled:opacity-70 checked:border-blue-500 checked:bg-blue-500" />
                      <div class="pointer-events-none absolute top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 text-white opacity-0 transition-opacity peer-checked:opacity-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor" stroke="currentColor" stroke-width="1">
                          <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                      </div>
                  </div>

                  {{-- <input name="checkboxes[]" value="{{ $cplss->kodeCPL }}" type="checkbox" class="border-gray-300 rounded-lg h-5 w-5"/> --}}
                </td>
                    
                @endforeach
            <?php } ?>
            <td>
                <button type="submit"  class="middle none center rounded-lg bg-blue-500 py-2 px-4 font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" data-ripple-light="true">
                  Simpan
                </button>
              </form>
            </td>
      </tr>
    @endforeach

  </tbody>

@endsection

