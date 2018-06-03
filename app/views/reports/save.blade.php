@extends('layout.main')


@section('content')
@parent

<nav class="page-actions container-fluid" class="page-actions">
  <div class="row">
    <div class="title col-md-6"><i class="fa fa-cog"></i> {{ $report->project->name }}/{{ $report->id ? 'Edit Report ' . $report->date : 'New Report' }}</div>
    <div class="actions col-md-6">
      <a href="{{ URL::route('project.reports', $report->project->id) }}" class="btn btn-default pull-right"><i class="fa fa-chevron-left"></i> Back to Reports</a>
    </div>
  </div>
</nav><!-- .actions -->

<div class="tabs row report" role="tabpanel">

  <!-- Nav tabs -->
  <div class="col-md-3">
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a class="info" href="#info" aria-controls="info" role="tab" data-toggle="tab">Report Date</a></li>
      <li <?php if(!$report->id) echo 'class="disabled disabledTab"'; ?> role="presentation"><a class="site_staff" href="#site_staff" aria-controls="site_staff" role="tab" data-toggle="tab">Site Staff</a></li>
      <li <?php if(!$report->id) echo 'class="disabled disabledTab"'; ?> role="presentation"><a class="company_labor" href="#company_labor" aria-controls="company_labor" role="tab" data-toggle="tab">Company Labors</a></li>
      <li <?php if(!$report->id) echo 'class="disabled disabledTab"'; ?> role="presentation"><a class="sub_labor" href="#sub_labor" aria-controls="sub_labor" role="tab" data-toggle="tab">Subcontractor Labors</a></li>
      <li <?php if(!$report->id) echo 'class="disabled disabledTab"'; ?> role="presentation"><a class="company_material" href="#company_material" aria-controls="company_material" role="tab" data-toggle="tab">Company Materials</a></li>
      <li <?php if(!$report->id) echo 'class="disabled disabledTab"'; ?> role="presentation"><a class="sub_material" href="#sub_material" aria-controls="sub_material" role="tab" data-toggle="tab">Subcontractor Materials</a></li>
    	<li <?php if(!$report->id) echo 'class="disabled disabledTab"'; ?> role="presentation"><a class="equipment" href="#equipment" aria-controls="equipment" role="tab" data-toggle="tab">Equipments</a></li>
    	<li <?php if(!$report->id) echo 'class="disabled disabledTab"'; ?> role="presentation"><a class="tool" href="#tool" aria-controls="tool" role="tab" data-toggle="tab">Tools</a></li>
    	<li <?php if(!$report->id) echo 'class="disabled disabledTab"'; ?> role="presentation"><a class="activity" href="#activity" aria-controls="activity" role="tab" data-toggle="tab">Activities at Site</a></li>
    	<li <?php if(!$report->id) echo 'class="disabled disabledTab"'; ?> role="presentation"><a class="violation" href="#violation" aria-controls="violation" role="tab" data-toggle="tab">Violations/deductions</a></li>
    	<li <?php if(!$report->id) echo 'class="disabled disabledTab"'; ?> role="presentation"><a class="note" href="#note" aria-controls="note" role="tab" data-toggle="tab">Notes/Attachments</a></li>
    </ul>
  </div>

  <!-- Tab panes -->
  <div class="tab-content col-md-9">
    <div role="tabpanel" class="tab-pane fade in active" id="info">@include('reports.forms.info')</div>
    <div role="tabpanel" class="tab-pane fade" id="site_staff">@include('reports.forms.site_staff')</div>
    <div role="tabpanel" class="tab-pane fade" id="company_labor">@include('reports.forms.company_labor')</div>
    <div role="tabpanel" class="tab-pane fade" id="sub_labor">@include('reports.forms.sub_labor')</div>
    <div role="tabpanel" class="tab-pane fade" id="company_material">@include('reports.forms.company_material')</div>
    <div role="tabpanel" class="tab-pane fade" id="sub_material">@include('reports.forms.sub_material')</div>
    <div role="tabpanel" class="tab-pane fade" id="equipment">@include('reports.forms.equipment')</div>
    <div role="tabpanel" class="tab-pane fade" id="tool">@include('reports.forms.tool')</div>
    <div role="tabpanel" class="tab-pane fade" id="activity">@include('reports.forms.activity')</div>
    <div role="tabpanel" class="tab-pane fade" id="violation">@include('reports.forms.violation')</div>
    <div role="tabpanel" class="tab-pane fade" id="note">@include('reports.forms.note')</div>
  </div>
</div><!-- .report -->

@stop