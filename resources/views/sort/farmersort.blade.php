<form method="GET" action="/sortreport">
              @csrf
             <label for="year" >Year</label>

              <select id="year" name="year" value="{{ old('year') }}">
                @foreach($year as $yr)
              <option>{{$yr}}</option>
              @endforeach
          </select>
           <label for="month" >Month</label>

             <select  name="month" id="month" value="{{ old('month') }}">
              <option>January</option>
              <option>February</option>
              <option>March</option>
              <option>April</option>
              <option>May</option>
              <option>June</option>
              <option>july</option>
              <option>August</option>
              <option>September</option>
              <option>October</option>
              <option>November</option>
              <option>December</option>
            </select>
             <button class="btn-success" type="submit">Search</button>
 </form>

