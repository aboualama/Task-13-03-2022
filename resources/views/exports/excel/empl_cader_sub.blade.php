
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center">  </th>  
              </tr>
            </thead>
            <tbody> 
              <tr> <th class="text-center">  </th>  </tr> 
              <tr> <th class="text-center">  </th>  </tr> 
              <tr> <th class="text-center">  </th>  </tr> 
              <tr> <th class="text-center">  </th>  </tr>  
              <tr> <th class="text-center">  </th>  <th class="text-center">برنامج الفاروق لادارة شئون العاملين</th>  </tr>  
            </tbody>
          </table>










          
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center">  م</th>
                <th class="text-center">  الاسم</th>
                <th class="text-center">  الوظيفة</th>
                <th class="text-center">  الرقم القومي</th>
                <th class="text-center">  المجموعة النوعية والدرجة المالية</th>
                <th class="text-center">  العمل القائم به</th>
                <th class="text-center">  المؤهل والتخصص</th>
                <th class="text-center">  تاريخ الميلاد</th>
                <th class="text-center">  تاريخ التعيين</th>
                <th class="text-center">  الحالة الوظيفية</th>
                <th class="text-center">   تاريخ التعيين</th>
                <th class="text-center">  الاجر الوظيفي</th>
              </tr>
            </thead>
            <tbody>
  
              @foreach ($employees as $i => $record) 
                  <tr>
                    <td>{{$i + 1}}</td> 
                    <td>{{$record->full_name ?? null}}</td> 
                    <td>{{$record->currently_job()->job_function_name ?? null}}</td> 
                    <td>{{$record->national_id ?? null}}</td> 
                    <td>{{$record->currently_job()->sub_group->name ?? null}} - {{$record->currently_job()->financial_degree->name ?? null}}</td> 
                    <td>{{$record->currently_job()->job_function_name ?? null}}</td> 
                    <td>{{$record->currently_qualification()->name ?? null}} - {{ $record->currently_qualification()->pivot->qualification_major ?? null}}</td>  
                    <td>{{date("Y-m-d", strtotime($record->birth_date)) ?? null}}</td> 
                    <td>{{date("Y-m-d", strtotime($record->join_date)) ?? null}}</td>    
                    <td>{{$record->currently_job()->job_status->name ?? null}}</td>   
                    <td>{{date("Y-m-d", strtotime($record->currently_job()->join_date)) }}</td> 
                    <td>00000</td> 
                  </tr>
              @endforeach
            
            </tbody>
          </table>