@extends ('layout.main')

@section('container')

<table class="table-fixed w-full min-w-full divide-y divide-gray-300 text-center">
    <thead class="bg-gray-50">
      <tr>
        <th scope="col" class="py-3.5 lg:px-4 text-center text-xs font-semibold text-gray-900">BK</th>
        <th scope="col" class="py-3.5 lg:px-4 text-center text-xs font-semibold text-gray-900">Nama BK</th>
        @foreach ($cpl as $cpl1)
          <th scope="col" class="py-3.5 lg:px-2 text-center text-xs font-semibold text-gray-900">{{ $cpl1->kodeCPL }}          
        @endforeach
        <th scope="col" class="py-3.5 lg:px-2 text-center text-xs font-semibold text-gray-900">Simpan</th>
      </tr>
    </thead>

    @foreach($bk as $bk1)
      <tr>
      <form action="/update/{{ $bk1->kodeBK }}" method="POST">
          @csrf
          @method('PUT')
          {{-- <td class="first-row-heading"><img src="{{ asset('assets/icons/minus.png') }}" alt="Minus"/></td> --}}
          {{-- <td class="first-row-heading"></td> --}}
          {{-- <td>{{ $loop->iteration }}</td> --}}
          <td>
              <input type="text" name="matakuliah_kode" class="py-3.5 lg:px-4 text-center text-xs font-semibold text-gray-900" value="{{ $bk1->kodeBK }}" placeholder="Kode MK">
          </td>
          <td>
              <input type="text" name="matakuliah_nama" class="py-3.5 lg:px-4 text-center text-xs font-semibold text-gray-900" value="{{ $bk1->namaBK }}" placeholder="Nama MK">
          </td>

          <?php if (in_array($bk1->kodeBK, $values)) { ?>
              @foreach (json_decode($cpl_bk, true) as $item)
                  @if ($item["kode_bk"]==$bk1->kodeBK)
                      @foreach ($cpl as $cpls)
                          <?php if (in_array($cpls->kodeCPL, explode(',', $item["pemetaan"]))) { ?>
                              <td>
                                <input name="checkboxes[]" type="checkbox" class="border-gray-300 rounded-lg h-5 w-5" checked/>
                              </td>

                          <?php } else { ?>
                            <td>
                              <input name="checkboxes[]" type="checkbox" class="border-gray-300 rounded-lg h-5 w-5"/>
                            </td>
                                  
                          <?php } ?>
                      @endforeach 
                  @endif
              @endforeach
              
          <?php } else { ?>
              @foreach ($cpl as $cplss)
              <td>
                <input name="checkboxes[]" type="checkbox" class="border-gray-300 rounded-lg h-5 w-5"/>
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

