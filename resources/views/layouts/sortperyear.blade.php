<form method="POST" action="/eventsperdate">
              @csrf
              <select name="year">
             @foreach($eventyear as $eventyr)
              <option>{{$eventyr}}</option>
              @endforeach
          </select>
             <select name="month">
              <option>January</option>
              <option>February 1</option>
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

