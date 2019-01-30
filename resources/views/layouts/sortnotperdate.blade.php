<form method="POST" action="/notificationsperdate">
              @csrf
              <select name="year">
              <option>2018</option>
              <option>2019</option>
              <option>2020</option>
              <option>2021</option>
              <option>2022</option>
              <option>2018</option>
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

