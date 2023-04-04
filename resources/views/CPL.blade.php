@extends ('layout.main')

@section('container')

<div class="mt-2 p-6 max-w-sm mx-auto max-w-none flex justify-left">
  <a href="/edit" class="duration-500 transform items-center justify-center px-8 py-2 text-sm font-medium rounded-md shadow-sm text-white bg-gradient-to-r from-cyan-400 to-blue-400"> Edit </a>
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
          {{-- <td class="first-row-heading"><img src="{{ asset('assets/icons/minus.png') }}" alt="Minus"/></td> --}}
          {{-- <td class="first-row-heading"></td> --}}
          {{-- <td>{{ $loop->iteration }}</td> --}}
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
                                <input type="checkbox" class="border-gray-700 rounded-lg h-5 w-5"disabled checked/>
                              </td>

                          <?php } else { ?>
                            <td>
                              <input type="checkbox" class="border-gray-700 rounded-lg h-5 w-5"disabled/>
                            </td>
                                  
                          <?php } ?>
                      @endforeach 
                  @endif
              @endforeach
              
          <?php } else { ?>
              @foreach ($cpl as $cplss)
              <td>
                <input type="checkbox" class="border-gray-700 rounded-lg h-5 w-5" disabled/>
              </td>
                  
              @endforeach
          <?php } ?>

      </tr>
    @endforeach

    {{-- <form class="" action="" method="POST"> 
      @csrf
    <tbody class="divide-y divide-gray-200 bg-white">
      @foreach ($bk as $bk)
      <tr class="text-center place-content-center justify-center content-center place-self-center place-items-center">
        <td class="py-3.5 lg:px-4 text-left text-xs font-semibold text-gray-900">{{ $bk->kodeBK }}</td>
        @foreach ($cpl as $cpl2)
          <td>
            <input type="checkbox" class="border-gray-300 rounded-lg h-5 w-5"/>
          </td>
        @endforeach           
        <td>
          <button class="middle none center rounded-lg bg-blue-500 py-2 px-4 font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" data-ripple-light="true">
            Simpan
          </button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </form> --}}

@endsection

