@extends('teacher.home')
@section('content-teacher')
      <div class="container">
        <div class="alert alert-warning"><h3 class="text-center">ĐIỂM DANH</h3></div>
        {{-- ERROR --}}
        <div>
            @if($errors->any())
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            @endif
        </div>
        {{-- DANGER --}}
        @if(session('Danger'))
        <div class="alert alert-danger font-weight-bold text-center">
            {{ session('Danger') }}
        </div>
        @endif
        {{-- SUCCESSFULLY --}}
        @if(session('Success'))
        <div class="alert alert-success font-weight-bold text-center">
            {{ session('Success') }}
        </div>
        @endif
        {{-- end-successfully --}}
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Mã sinh viên</th>
                        <th>Họ và Tên</th>
                        <th class="text-center">Hình</th>
                        <th class="text-center">
                            <img src="{{ $student->avatar_img_path }}" alt="{{ $student->avatar_img_path }}"  width="100px">
                        </th>
                        <td class="text-center">
                                <div class="confirm-switch mx-auto">
                                    <input type="checkbox" id="default-switch{{ $student->id }}" value="{{ $student->id }}" name="attendance[]">
                                    <label for="default-switch{{ $student->id }}"></label>
                                </div>

                                {{-- <input type="checkbox" name="attendance[]" value="{{ $student->id }}" class=""> --}}
                            
                            {{-- <div class="slideTwo">  
                                <input type="checkbox" value="None" id="slideTwo" name="check" checked />
                                <label class="labelSlide" for="slideTwo"></label>
                              </div> --}}
                        </td>
                    </tr>
                    @endforeach        
                    <input type="hidden" name="days_class_subject_id" value="{{ $classSubject->dcs_id }}">
                    <input type="hidden" name="class_id" value="{{ $classSubject->class_id }}">
                    <input type="hidden" name="study_time_id" value="{{ $classSubject->study_time_id }}">
                    <tr class="row-center">
                        <td colspan="4"  class="text-secondary font-italic small">  
                            <textarea type="text" class="form-control" name="note" placeholder="Ghi chú..."></textarea>
                        </td>
                        <td class="text-center">
                            <button type="submit" class="btn btn-success " id="Luu" {{ $timeOut=='false'?'':'disabled' }}>Lưu lại</button>
                        </td>
                    </tr>
                </form>
            </tbody>
        </table>
      </div>
 @endsection