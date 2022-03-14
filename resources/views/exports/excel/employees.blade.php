
        <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center"> م</th>
                <th class="text-center"> الاسم الاول</th>
                <th class="text-center"> النوع</th>
                <th class="text-center"> الحالة الصحية</th>
                <th class="text-center"> الحالة الاجتماعية</th>
                <th class="text-center"> الحالة العسكرية</th>
                <th class="text-center"> رقم الهاتف</th>
                <th class="text-center"> المؤهل</th>
              </tr>
            </thead>
            <tbody>
  
              @foreach ($employee as $i => $record) 
                  <tr>
                    <td>{{$i + 1}}</td> 
                    <td>{{$record->first_name ?? null}}</td> 
                    <td>{{$record->gender->name ?? null}}</td>  
                    <td>{{$record->health_status->name ?? null}}</td>   
                    <td>{{$record->social_status->name ?? null}}</td>  
                    <td>{{$record->military_treatment->name ?? null}}</td>  
                    <td>
                      {{$record->phones->first()->number ?? null}}
                    </td>   
                    <td> 
                      {{$record->currently_qualification()->name ?? null}} 
                    </td>   
                  </tr>
              @endforeach
            
            </tbody>
          </table>