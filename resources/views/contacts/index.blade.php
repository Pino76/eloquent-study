@foreach($users AS $user)
    <ul>
        <li><strong>{{$user->name}}</strong> Lavora presso => {{$user->branch["branch_name"]}}</li>
        @foreach($user->contacts AS $contact)
            <ul>
                <li>{{$contact->first_name}} {{$contact->last_name}}</li>
            </ul>
        @endforeach
    </ul>
@endforeach
