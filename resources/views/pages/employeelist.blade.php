@extends('pages.common')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Contacts</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/index">Home</a></li>
              <li class="breadcrumb-item active">Contacts</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <table id="employees"  style="width:100%">
        <!-- <thead>
          <tr>
            <th>内部名</th>
            <th>一般名</th>
            <th>表示名</th>
          </tr>
        </thead> -->
      </table>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection
  
@section('javascript')


<script>
var editor; // use a global for the submit and return data rendering in the ipadipodLists
var employeeTable;
$(document).ready(function() {
  // editor = new $.fn.dataTable.Editor({
  //   ajax: {
  //     create: {
  //       type: 'POST',
  //       url: '/rpa/api/system/iphone_create',
  //       data:function(data){
  //         var result={};  
  //         for(var i in data.data){  
  //           var result=data.data[i];  
  //           result.DT_RowId=i; 
  //           result.action=data.action;
  //           result.headers={"X-CSRFToken": csrfToken};
  //           var retjson = JSON.stringify( result );
  //           console.log(retjson);  
  //         }  
  //         return result;  
  //       },
  //       success: function (json) {
  //         createIphoneList();
  //       }
  //     },
  //     edit: {
  //       type: 'POST',
  //       url: '/rpa/api/system/iphone_update',
  //       data:function(data){
  //         var result={};  
  //         for(var i in data.data){  
  //           var result=data.data[i];  
  //           result.DT_RowId=i; 
  //           result.action=data.action;
  //           var retjson = JSON.stringify( result );
  //           console.log(retjson);  
  //         }  
  //         return result;  
  //       },
  //       success: function (json) {
  //         createIphoneList();
  //       }
  //     },
  //     remove: {
  //       type: 'POST',
  //       url: '/rpa/api/system/iphone_delete',
  //       data:function(data){
  //         var result={};  
  //         for(var i in data.data){  
  //           var result=data.data[i];  
  //           result.DT_RowId=i; 
  //           result.action=data.action;
  //           var retjson = JSON.stringify( result );
  //           console.log(retjson);  
  //         }  
  //         return result;  
  //       },
  //       success: function (json) {
  //         createIphoneList();
  //       },
  //       deleteBody: true
  //     }
  //   },
  //   idSrc: "internal_name",
  //   table: "#ipadipodList",
  //   fields: [{
  //       label: "内部名:",
  //       name: "internal_name"
  //     }, {
  //       label: "一般名:",
  //       name: "model_name"
  //     }, {
  //       label: "表示名:",
  //       name: "disp_name"
  //     }
  //   ]
  // });
  employeeTable = createEmployeeTable();
} );

function createEmployeeTable() {
  var url="/employee/listdata";
  axios.post(url, {
    headers: {},
    data: {}
  }).then(response => {
    // var datas = JSON.stringify(response.data);
    var datas = response.data;
    if(employeeTable) {
      employeeTable.destroy();
      employeeTable.clear();
    }

    $('#employees').DataTable( {

      data: datas,
      pageLength: 20,
      columns: [
        {
          "title":"社員番号",
          "data": "id"
        },
        {
          "title":"名前",
          "data": "name"
        },
        {
          "title":"カナ",
          "data": "kana"
        },
        {
          "title":"生年月日",
          "data": "birthday"
        },
        {
          "title":"性別",
          "data": "sex"
        },
        {
          "title":"携帯",
          "data": "mobile"
        },
        {
          "title":"職位",
          "data": "code_Name"
        },
        {
          "title":"email",
          "data": "email"
        },
        {
          "title":"プロジェクト",
          "data": "project_Id"
        }
      ],
      select: true,
      columnDefs: [

       ],
      buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
        {
          extend: 'print',
          exportOptions: {
              columns: ':visible'
          }
        },
        'colvis'
      ]
    } );
  })
  .catch(err => {
    alert(err);
    return;
  });
}
 
</script>
@endsection