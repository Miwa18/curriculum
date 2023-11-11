@extends('layouts.layout')
@section('content')
@include('layouts.nav')
<table class="table align-middle mb-0 bg-white">
  <thead class="bg-light">
    <tr>
      <th>名前</th>
      <th>メールアドレス</th>
      <th>編集</th>
      <th>削除</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
      <td>
        <div class="d-flex align-items-center">
          <div class="ms-3">
            <p class="fw-bold mb-1">{{$user['name']}}</p>
            <p class="text-muted mb-0">{{$user['kana']}}</p>
          </div>
        </div>
      </td>
      <td>
        <p class="fw-normal mb-1">{{$user['email']}}</p>
      </td>
      <td><a href="/shift/user/{{$user['id']}}/edit">編集<a></td>
      <td>
        <from action="{{route('user.destroy',$user['id'])}}" method="POST">
          @csrf
          @method('DELETE')
      <input type="submit" value="削除" onclick="return confirm('本当に削除しますか？');">
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>


@endsection
