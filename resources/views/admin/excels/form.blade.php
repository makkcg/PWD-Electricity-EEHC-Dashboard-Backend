
<div dir="rtl">
   <!-- general form elements -->
   <div dir="rtl" class="box box-info">

      <!-- /.box-header -->
      <!-- form start -->
      <div class="box-body">
        <div class="form-group col-md-12 {{ $errors->has('className') ? ' has-error' : '' }}">
         <label for="className">ادخال شيت الاكسيل </label>

        <select class="form-control" name="className">
            <option value="">اختار الجدول</option>
            <option value="App\Imports\About\AboutsImport">ادخال بيانات عن المشروع</option>
            <option value="App\Imports\About\AboutSoundsImport">ادخال اصوات المشروع</option>
            <option value="App\Imports\About\AboutVideosImport">ادخال فيديوهات المشروع</option>

            <option value="App\Imports\Foundation\FoundationsImport">ادخال بيانات المؤسسة</option>
            <option value="App\Imports\Foundation\FoundationImagesImport">ادخال صور المؤسسة</option>
            <option value="App\Imports\Foundation\FoundationSoundsImport">ادخال اصوات المؤسسة</option>
            <option value="App\Imports\Foundation\FoundationVideosImport">ادخال فيديوهات المؤسسة</option>

            <option value="App\Imports\Branch\BranchsImport">ادخال بيانات الفروع</option>
            <option value="App\Imports\Branch\BranchImagesImport">ادخال صور الفروع</option>
            <option value="App\Imports\Branch\BranchSoundsImport">ادخال اصوات الفروع</option>
            <option value="App\Imports\Branch\BranchVideosImport">ادخال فيديوهات الفروع</option>

            <option value="App\Imports\Service\ServicesImport">ادخال بيانات الخدمات</option>
            <option value="App\Imports\Service\ServiceImagesImport">ادخال صور الخدمات</option>
            <option value="App\Imports\Service\ServiceMediasImport">ادخال  اصوات وفيديوهات الخدمات</option>

            <option value="App\Imports\Document\DocumentsImport">ادخال بيانات المستندات</option>
            <option value="App\Imports\Document\DocumentImagesImport">ادخال صور المستندات</option>
            <option value="App\Imports\Document\DocumentMediasImport">ادخال  اصوات وفيديوهات المستندات</option>

            <option value="App\Imports\Faq\FaqsImport">ادخال بيانات الاسئلة الشائعة</option>
            <option value="App\Imports\Faq\FaqImagesImport">ادخال صور الاسئلة الشائعة</option>
            <option value="App\Imports\Faq\FaqMediasImport">ادخال  اصوات وفيديوهات الاسئلة الشائعة</option>

            <option value="App\Imports\Procedure\ProceduresImport">ادخال بيانات الإجراءات</option>
            <option value="App\Imports\Procedure\ProcedureImagesImport">ادخال صور الإجراءات</option>
            <option value="App\Imports\Procedure\ProcedureMediasImport">ادخال  اصوات وفيديوهات الإجراءات</option>

            <option value="App\Imports\Regulation\RegulationsImport">ادخال بيانات الشروط والاحكام</option>
            <option value="App\Imports\Regulation\RegulationImagesImport"> ادخال صورالشروط والاحكام  </option>
            <option value="App\Imports\Regulation\RegulationMediasImport">ادخال  اصوات وفيديوهات الشروط والاحكام </option>
            <option value="App\Imports\Dictionary\DictionaryImport">ادخال كلمات القاموس</option>
            <option value="App\Imports\Dictionary\DictionaryMediaImport">ادخال صور وفيديوهات القاموس</option>
            <option value="App\Imports\State\StateSoundsImport">ادخال صوت المحافظات</option>
        </select>
        <br>
        <input type="file" name="file" class="form-control">
        <br>
        @if($errors->has('file'))
        <span class="help-bloack">
        <strong>{{$errors->first('file') }}</strong>
        </span>
        @endif
</div>

<h2>تحميل نماذج الملفات</h2>
<div class="row">
    <div class="col-xs-12">

        <div class="box">
            <!-- /.box-header -->

            <div class="box-body">

                <table dir="rtl" id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th style="text-align: right"> #</th>
                        <th style="text-align: right">اسم الملف</th>
                        <th style="text-align: right">تحميل</th>
                    </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>1</td>
                            <td>بيانات المشروع</td>
                            <td> <a href="{{ asset('/excel/about/about.xlsx') }}" download><i class="fas fa-file-excel"></i></a></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>اصوات المشروع</td>
                            <td> <a href="{{ asset('/excel/about/sounds.xlsx') }}" download><i class="fas fa-file-excel"></i></a></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>فيديوهات المشروع</td>
                            <td> <a href="{{ asset('/excel/about/videos.xlsx') }}" download><i class="fas fa-file-excel"></i></a></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>بيانات المؤسسة</td>
                            <td> <a href="{{ asset('/excel/foundation/foundation.xlsx') }}" download><i class="fas fa-file-excel"></i></a></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>صور المؤسسة</td>
                            <td> <a href="{{ asset('/excel/foundation/images.xlsx') }}" download><i class="fas fa-file-excel"></i></a></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>فيديوهات المؤسسة</td>
                            <td> <a href="{{ asset('/excel/foundation/videos.xlsx') }}" download><i class="fas fa-file-excel"></i></a></td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>بيانات الفروع</td>
                            <td> <a href="{{ asset('/excel/branch/branch.xlsx') }}" download><i class="fas fa-file-excel"></i></a></td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>صور الفروع</td>
                            <td> <a href="{{ asset('/excel/branch/images.xlsx') }}" download><i class="fas fa-file-excel"></i></a></td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>اصوات الفروع</td>
                            <td> <a href="{{ asset('/excel/branch/sounds.xlsx') }}" download><i class="fas fa-file-excel"></i></a></td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>فيديوهات الفروع</td>
                            <td> <a href="{{ asset('/excel/branch/videos.xlsx') }}" download><i class="fas fa-file-excel"></i></a></td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>بيانات الخدمات</td>
                            <td> <a href="{{ asset('/excel/service/service.xlsx') }}" download><i class="fas fa-file-excel"></i></a></td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td>صور الخدمات</td>
                            <td> <a href="{{ asset('/excel/service/images.xlsx') }}" download><i class="fas fa-file-excel"></i></a></td>
                        </tr>
                        <tr>
                            <td>13</td>
                            <td>اصوات وفيديوهات الخدمات</td>
                            <td> <a href="{{ asset('/excel/service/media.xlsx') }}" download><i class="fas fa-file-excel"></i></a></td>
                        </tr>
                        <tr>
                            <td>14</td>
                            <td>بيانات المستندات</td>
                            <td> <a href="{{ asset('/excel/document/document.xlsx') }}" download><i class="fas fa-file-excel"></i></a></td>
                        </tr>
                        <tr>
                            <td>15</td>
                            <td>صور المستندات</td>
                            <td> <a href="{{ asset('/excel/document/images.xlsx') }}" download><i class="fas fa-file-excel"></i></a></td>
                        </tr>
                        <tr>
                            <td>16</td>
                            <td>اصوات وفيديوهات المستندات</td>
                            <td> <a href="{{ asset('/excel/document/media.xlsx') }}" download><i class="fas fa-file-excel"></i></a></td>
                        </tr>
                            <td>17</td>
                            <td>بيانات الاسئلة الشائعة</td>
                            <td> <a href="{{ asset('/excel/faq/faq.xlsx') }}" download><i class="fas fa-file-excel"></i></a></td>
                        </tr>
                        <tr>
                            <td>18</td>
                            <td>صور الاسئلة الشائعة</td>
                            <td> <a href="{{ asset('/excel/faq/images.xlsx') }}" download><i class="fas fa-file-excel"></i></a></td>
                        </tr>
                        <tr>
                            <td>19</td>
                            <td>اصوات وفيديوهات الاسئلة الشائعة</td>
                            <td> <a href="{{ asset('/excel/faq/media.xlsx') }}" download><i class="fas fa-file-excel"></i></a></td>
                        </tr>
                        <tr>
                            <td>20</td>
                            <td>بيانات الاجراءات</td>
                            <td> <a href="{{ asset('/excel/procedure/procedure.xlsx') }}" download><i class="fas fa-file-excel"></i></a></td>
                        </tr>
                        <tr>
                            <td>21</td>
                            <td>صور الاجراءات</td>
                            <td> <a href="{{ asset('/excel/procedure/images.xlsx') }}" download><i class="fas fa-file-excel"></i></a></td>
                        </tr>
                        <tr>
                            <td>22</td>
                            <td>اصوات وفيديوهات الاجراءات</td>
                            <td> <a href="{{ asset('/excel/procedure/media.xlsx') }}" download><i class="fas fa-file-excel"></i></a></td>
                        </tr>
                        <tr>
                            <td>23</td>
                            <td>بيانات الشروط والاحكام</td>
                            <td> <a href="{{ asset('/excel/regulation/regulation.xlsx') }}" download><i class="fas fa-file-excel"></i></a></td>
                        </tr>
                        <tr>
                            <td>24</td>
                            <td>صور الشروط والاحكام</td>
                            <td> <a href="{{ asset('/excel/regulation/images.xlsx') }}" download><i class="fas fa-file-excel"></i></a></td>
                        </tr>
                        <tr>
                            <td>25</td>
                            <td>اصوات وفيديوهات الشروط والاحكام</td>
                            <td> <a href="{{ asset('/excel/regulation/media.xlsx') }}" download><i class="fas fa-file-excel"></i></a></td>
                        </tr>
                        <tr>
                            <td>26</td>
                            <td>اصوات المحافظات</td>
                            <td> <a href="{{ asset('/excel/state/sounds.xlsx') }}" download><i class="fas fa-file-excel"></i></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>

    </div>
</div>

</div>
      <!-- /.box-body -->
   </div>

</div>

