@extends ('layout.main')

@section('container')

<div class="mt-2 p-6 max-w-sm mx-auto max-w-none flex justify-left">
  <a href="/edit" class="duration-500 transform items-center justify-center px-8 py-2 text-sm font-medium rounded-md shadow-sm text-white bg-gradient-to-r from-cyan-500 to-blue-500"> Edit </a>
</div>

<table class="table-auto w-full min-w-full divide-y divide-gray-300 text-center">
    <thead class="bg-gray-50">
      <tr>
        <th scope="col" class="py-3.5 lg:px-4 w-1/6 text-center text-xs font-semibold text-gray-900">BK</th>
        <th scope="col" class="py-3.5 lg:px-4 w-2/6 text-center text-xs font-semibold text-gray-900">Nama BK</th>
        @foreach ($cpl as $cpl1)
          <th scope="col" class="py-3.5 lg:px-2 text-center text-xs font-semibold text-gray-900">{{ $cpl1->kodeCPL }}    </th>       
        @endforeach
      </tr>
    </thead>

    @foreach($bk as $bk1)
      <tr>
          <td>
              <p class="py-3.5 text-center text-xs font-semibold text-gray-900">{{ $bk1->kodeBK }}</p>
          </td>
          <td>
              <p class="py-3.5 text-center text-xs font-semibold text-gray-900">{{ $bk1->namaBK }}</p>
          </td>

          <?php if (in_array($bk1->kodeBK, $values)) { ?>
              @foreach (json_decode($cpl_bk, true) as $item)
                  @if ($item["kode_bk"]==$bk1->kodeBK)
                      @foreach ($cpl as $cpls)
                          <?php if (in_array($cpls->kodeCPL, explode(',', $item["pemetaan"]))) { ?>
                              <td>
                                <div class="inline-flex items-center">
                                  <label class="relative flex cursor-pointer items-center rounded-full p-3" for="checkbox" data-ripple-dark="true">
                                    <input checked disabled type="checkbox" class="peer relative h-5 w-5 appearance-none rounded border disabled:opacity-70 checked:border-blue-500 checked:bg-blue-500" id="checkbox"  />
                                    <div class="pointer-events-none absolute top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 text-white opacity-0 transition-opacity peer-checked:opacity-100">
                                      <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor" stroke="currentColor" stroke-width="1">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                      </svg>
                                    </div>
                                </div>
                                {{-- <input type="checkbox" class="border-gray-700 h-5 w-5 checked:border-primary checked:bg-primary"checked disabled /> --}}
                              </td>

                          <?php } else { ?>
                            <td>
                              <div class="inline-flex items-center">
                                <label class="relative flex cursor-pointer items-center rounded-full p-3" for="checkbox" data-ripple-dark="true">
                                  <input disabled type="checkbox" class="peer relative h-5 w-5 appearance-none rounded border border-gray-400 disabled:opacity-70 checked:border-blue-500 checked:bg-blue-500" id="checkbox"  />
                                  <div class="pointer-events-none absolute top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 text-white opacity-0 transition-opacity peer-checked:opacity-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor" stroke="currentColor" stroke-width="1">
                                      <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                  </div>
                              </div>
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
                    <input disabled type="checkbox" class="peer relative h-5 w-5 appearance-none rounded border border-gray-400 disabled:opacity-70 checked:border-blue-500 checked:bg-blue-500" id="checkbox"  />
                    <div class="pointer-events-none absolute top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 text-white opacity-0 transition-opacity peer-checked:opacity-100">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor" stroke="currentColor" stroke-width="1">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                      </svg>
                    </div>
                </div>
              </td>
                  
              @endforeach
          <?php } ?>

      </tr>
    @endforeach

@endsection

