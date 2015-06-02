<h1>This is the reservation page</h1>


{!! Form::open(['url' => 'check']) !!}
<ul>
    <li>
        {!! Form::label('date', 'Date: ') !!}
        {!! Form::input('date', 'date') !!}
    </li>
    <li>
        {!! Form::label('time', 'Time: ') !!}
        {!! Form::select('time', [
                '1200' => '12:00PM',
                '1230' => '12:30PM',
                '1300' => '1:00PM',
                '1330' => '1:30PM',
                '1400' => '2:00PM',
                '1430' => '2:30PM',
                '1500' => '3:00PM',
                '1530' => '3:30PM',
                '1600' => '4:00PM',
                '1630' => '4:30PM',
                '1700' => '5:00PM',
                '1730' => '5:30PM',
                '1800' => '6:00PM',
                '1830' => '6:30PM',
                '1900' => '7:00PM',
                '1930' => '7:30PM',
                '2000' => '8:00PM',
                '2030' => '8:30PM'
            ])
        !!}
    </li>
    <li>
        {!! Form::label('capacity', 'Size: ') !!}
        {!! Form::select('capacity', [
                '2' => '2', 
                '3' => '3', 
                '4' => '4', 
                '5' => '5', 
                '6' => '6',
                '7' => '7', 
                '8' => '8', 
                '9' => '9', 
                '10' => '10'
            ])
        !!}
    </li>
    <li>
        {!! Form::submit('Next') !!}
    </li>
</ul>
{!! Form::close() !!}
