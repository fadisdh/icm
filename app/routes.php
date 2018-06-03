<?php



/*

|--------------------------------------------------------------------------

| Application Routes

|--------------------------------------------------------------------------

|

| Here is where you can register all of the routes for an application.

| It's a breeze. Simply tell Laravel the URIs it should respond to

| and give it the Closure to execute when that URI is requested.

|

*/



Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'))->before('auth');



/* Login

----------------------------------------------------------------------------------------------------*/

Route::get('login', array('as' => 'login', 'uses' => 'LoginController@login'))->before('guest');

Route::post('login', array('as' => 'login.post', 'uses' => 'LoginController@loginPost'))->before('guest|csrf');

Route::get('logout', array('as' => 'logout', 'uses' => 'LoginController@logout'))->before('auth');



/* Report

*****************************************************************/

Route::get('/project/reports/{projectId}', array('as' => 'project.reports', 'uses' => 'ReportController@all'))->before('auth');

Route::get('/project/report/view/{id}/{projectId}', array('as' => 'project.report.view', 'uses' => 'ReportController@view'))->before('auth');

Route::get('/project/report/save/{id}/{projectId}', array('as' => 'project.report.add', 'uses' => 'ReportController@save'))->before('auth');

Route::get('/project/report/save/{id}', array('as' => 'project.report.save', 'uses' => 'ReportController@save'))->before('auth');

Route::get('/project/report/delete/{id}', array('as' => 'project.report.delete', 'uses' => 'ReportController@delete'))->before('auth');



/* Report info

*****************************************************************/

Route::post('/project/report/post/{id}/{projectId}', array('as' => 'project.report.save.post', 'uses' => 'ReportController@savePostInfo'))->before('auth');



/* Report Site Staff

*****************************************************************/

Route::post('/project/report/sitestaffs/post/{reportId}/{staffId}', array('as' => 'report.sitestaffs.save.post', 'uses' => 'ReportController@savePostSiteStaff'))->before('auth');



/* Report Company labor

*****************************************************************/

Route::post('/project/report/company/labors/post/{reportId}/{companyLaborId}', array('as' => 'report.companylabors.save.post', 'uses' => 'ReportController@savePostCompanyLabor'))->before('auth');



/* Report Subcontractor labor

*****************************************************************/

Route::post('/project/report/subcontractor/labors/post/{reportId}/{subLaborId}', array('as' => 'report.sublabors.save.post', 'uses' => 'ReportController@savePostSubcontractorLabor'))->before('auth');



/* Report Company Material

*****************************************************************/

Route::post('/project/report/company/materials/post/{reportId}/{companyMaterialId}', array('as' => 'report.company.materials.save.post', 'uses' => 'ReportController@savePostCompanyMaterial'))->before('auth');



/* Report Subcontractor Material

*****************************************************************/

Route::post('/project/report/subcontractor/materials/post/{reportId}/{subMaterialId}', array('as' => 'report.sub.materials.save.post', 'uses' => 'ReportController@savePostSubcontractorMaterial'))->before('auth');



/* Report Equipment

*****************************************************************/

Route::post('/project/report/equipment/post/{reportId}/{eqOperationId}', array('as' => 'report.equipment.save.post', 'uses' => 'ReportController@savePostEquipment'))->before('auth');



/* Report Tool

*****************************************************************/

Route::post('/project/report/tool/post/{reportId}/{toolOperationId}/{toolId}', array('as' => 'report.tool.save.post', 'uses' => 'ReportController@savePostTool'))->before('auth');



/* Report Activity

*****************************************************************/

Route::post('/project/report/activity/post/{reportId}/{activityId}', array('as' => 'report.activity.save.post', 'uses' => 'ReportController@savePostActivity'))->before('auth');



/* Report Violation

*****************************************************************/

Route::post('/project/report/violation/post/{reportId}/{violationId}', array('as' => 'report.violation.save.post', 'uses' => 'ReportController@savePostViolation'))->before('auth');



/* Report Note

*****************************************************************/

Route::post('/project/report/note/post/{reportId}/{noteId}', array('as' => 'report.note.save.post', 'uses' => 'ReportController@savePostNote'))->before('auth');



/* Projects

*****************************************************************/

Route::get('/projects', array('as' => 'projects', 'uses' => 'ProjectController@all'))->before('auth');

Route::get('/project/view/{id}', array('as' => 'project.view', 'uses' => 'ProjectController@view'))->before('auth');

Route::get('/project/save/{id}', array('as' => 'project.save', 'uses' => 'ProjectController@save'))->before('auth');

Route::post('/project/save/post/{id}', array('as' => 'project.save.post', 'uses' => 'ProjectController@savePost'))->before('auth');

Route::get('/project/delete/{id}', array('as' => 'project.delete', 'uses' => 'ProjectController@delete'))->before('auth');


//DSI
Route::get('/project/delete/dsi/{id}', array('as' => 'project.deleteDSI', 'uses' => 'ProjectController@deleteDSI'))->before('auth');
Route::post('/project/{id}/add/dsi', array('as' => 'project.addDSI', 'uses' => 'ProjectController@addDSI'))->before('auth|csrf');
Route::post('/project/{id}/import/dsi', array('as' => 'project.importDSI', 'uses' => 'ProjectController@importDSI'))->before('auth');


Route::get('/projects/export', array('as' => 'project.export', 'uses' => 'ProjectController@export'))->before('auth');

Route::get('/projects/import', array('as' => 'project.import', 'uses' => 'ProjectController@import'))->before('auth');





/*Attachments

*****************************************************************/

Route::get('/attachments', array('as' => 'attachments', 'uses' => 'AttachmentController@all'))->before('auth');

Route::get('/attachment/view/{id}', array('as' => 'attachment.view', 'uses' => 'AttachmentController@view'))->before('auth');

Route::get('/attachment/save/{id}', array('as' => 'attachment.save', 'uses' => 'AttachmentController@save'))->before('auth');

Route::post('/attachment/save/post/{id}', array('as' => 'attachment.save.post', 'uses' => 'AttachmentController@savePost'))->before('auth');

Route::get('/attachment/delete/{id}', array('as' => 'attachment.delete', 'uses' => 'AttachmentController@delete'))->before('auth');

Route::get('attachment/download/{id}/',array('as' => 'attachment.download', 'uses' => 'AttachmentController@download'))->before('auth');



/*Divisions

*****************************************************************/

Route::get('/divisions', array('as' => 'divisions', 'uses' => 'DivisionController@all'))->before('auth');

Route::get('/division/view/{id}', array('as' => 'division.view', 'uses' => 'DivisionController@view'))->before('auth');

Route::get('/division/save/{id}', array('as' => 'division.save', 'uses' => 'DivisionController@save'))->before('auth');

Route::post('/division/save/post/{id}', array('as' => 'division.save.post', 'uses' => 'DivisionController@savePost'))->before('auth');

Route::get('/division/delete/{id}', array('as' => 'division.delete', 'uses' => 'DivisionController@delete'))->before('auth');



/*Equipments

*****************************************************************/

Route::get('/equipments', array('as' => 'equipments', 'uses' => 'EquipmentController@all'))->before('auth');

Route::get('/equipment/view/{id}', array('as' => 'equipment.view', 'uses' => 'EquipmentController@view'))->before('auth');

Route::get('/equipment/save/{id}', array('as' => 'equipment.save', 'uses' => 'EquipmentController@save'))->before('auth');

Route::post('/equipment/save/post/{id}', array('as' => 'equipment.save.post', 'uses' => 'EquipmentController@savePost'))->before('auth');

Route::get('/equipment/delete/{id}', array('as' => 'equipment.delete', 'uses' => 'EquipmentController@delete'))->before('auth');


Route::get('/equipments/export', array('as' => 'equipment.export', 'uses' => 'EquipmentController@export'))->before('auth');

Route::get('/equipments/import', array('as' => 'equipment.import', 'uses' => 'EquipmentController@import'))->before('auth');


/*Equipment operation

*****************************************************************/

Route::get('/equipments/operations', array('as' => 'equipments.operations', 'uses' => 'EquipmentOperationController@all'))->before('auth');

Route::get('/equipment/operation/save/{id}', array('as' => 'equipment.operation.save', 'uses' => 'EquipmentOperationController@save'))->before('auth');

Route::post('/equipment/operation/save/post/{id}', array('as' => 'equipment.operation.save.post', 'uses' => 'EquipmentOperationController@savePost'))->before('auth');

Route::get('/equipment/operation/delete/{id}', array('as' => 'equipment.operation.delete', 'uses' => 'EquipmentOperationController@delete'))->before('auth');

Route::get('/equipment/operation/attachment/download/{id}/',array('as' => 'equipment.operation.attachment.download', 'uses' => 'EquipmentOperationController@download'))->before('auth');


/*Items

*****************************************************************/

Route::get('/items', array('as' => 'items', 'uses' => 'ItemController@all'))->before('auth');

Route::get('/item/view/{id}', array('as' => 'item.view', 'uses' => 'ItemController@view'))->before('auth');

Route::get('/item/save/{id}', array('as' => 'item.save', 'uses' => 'ItemController@save'))->before('auth');

Route::post('/item/save/post/{id}', array('as' => 'item.save.post', 'uses' => 'ItemController@savePost'))->before('auth');

Route::get('/item/delete/{id}', array('as' => 'item.delete', 'uses' => 'ItemController@delete'))->before('auth');



/*Labors

*****************************************************************/

Route::get('/labors', array('as' => 'labors', 'uses' => 'LaborController@all'))->before('auth');

Route::get('/labor/view/{id}', array('as' => 'labor.view', 'uses' => 'LaborController@view'))->before('auth');

Route::get('/labor/save/{id}', array('as' => 'labor.save', 'uses' => 'LaborController@save'))->before('auth');

Route::post('/labor/save/post/{id}', array('as' => 'labor.save.post', 'uses' => 'LaborController@savePost'))->before('auth');

Route::get('/labor/delete/{id}', array('as' => 'labor.delete', 'uses' => 'LaborController@delete'))->before('auth');



Route::get('/labors/export', array('as' => 'labor.export', 'uses' => 'LaborController@export'))->before('auth');

Route::get('/labors/import', array('as' => 'labor.import', 'uses' => 'LaborController@import'))->before('auth');





/*Materials

*****************************************************************/

Route::get('/materials', array('as' => 'materials', 'uses' => 'MaterialController@all'))->before('auth');

Route::get('/material/view/{id}', array('as' => 'material.view', 'uses' => 'MaterialController@view'))->before('auth');

Route::get('/material/save/{id}', array('as' => 'material.save', 'uses' => 'MaterialController@save'))->before('auth');

Route::post('/material/save/post/{id}', array('as' => 'material.save.post', 'uses' => 'MaterialController@savePost'))->before('auth');

Route::get('/material/delete/{id}', array('as' => 'material.delete', 'uses' => 'MaterialController@delete'))->before('auth');



Route::get('/materials/export', array('as' => 'material.export', 'uses' => 'MaterialController@export'))->before('auth');

Route::get('/materials/import', array('as' => 'material.import', 'uses' => 'MaterialController@import'))->before('auth');





/*Occupations

*****************************************************************/

Route::get('/occupations', array('as' => 'occupations', 'uses' => 'OccupationController@all'))->before('auth');

Route::get('/occupation/view/{id}', array('as' => 'occupation.view', 'uses' => 'OccupationController@view'))->before('auth');

Route::get('/occupation/save/{id}', array('as' => 'occupation.save', 'uses' => 'OccupationController@save'))->before('auth');

Route::post('/occupation/save/post/{id}', array('as' => 'occupation.save.post', 'uses' => 'OccupationController@savePost'))->before('auth');

Route::get('/occupation/delete/{id}', array('as' => 'occupation.delete', 'uses' => 'OccupationController@delete'))->before('auth');



Route::get('/occupations/export', array('as' => 'occupation.export', 'uses' => 'OccupationController@export'))->before('auth');

Route::get('/occupations/import', array('as' => 'occupation.import', 'uses' => 'OccupationController@import'))->before('auth');





/*Roles

*****************************************************************/

Route::get('/roles', array('as' => 'roles', 'uses' => 'RoleController@all'))->before('auth');

Route::get('/role/view/{id}', array('as' => 'role.view', 'uses' => 'RoleController@view'))->before('auth');

Route::get('/role/save/{id}', array('as' => 'role.save', 'uses' => 'RoleController@save'))->before('auth');

Route::post('/role/save/post/{id}', array('as' => 'role.save.post', 'uses' => 'RoleController@savePost'))->before('auth');

Route::get('/role/delete/{id}', array('as' => 'role.delete', 'uses' => 'RoleController@delete'))->before('auth');



Route::get('/roles/export', array('as' => 'role.export', 'uses' => 'RoleController@export'))->before('auth');

Route::get('/roles/import', array('as' => 'role.import', 'uses' => 'RoleController@import'))->before('auth');





/*Sections

*****************************************************************/

Route::get('/sections', array('as' => 'sections', 'uses' => 'SectionController@all'))->before('auth');

Route::get('/section/view/{id}', array('as' => 'section.view', 'uses' => 'SectionController@view'))->before('auth');

Route::get('/section/save/{id}', array('as' => 'section.save', 'uses' => 'SectionController@save'))->before('auth');

Route::post('/section/save/post/{id}', array('as' => 'section.save.post', 'uses' => 'SectionController@savePost'))->before('auth');

Route::get('/section/delete/{id}', array('as' => 'section.delete', 'uses' => 'SectionController@delete'))->before('auth');



/*Suppliers

*****************************************************************/

Route::get('/suppliers', array('as' => 'suppliers', 'uses' => 'SupplierController@all'))->before('auth');

Route::get('/supplier/view/{id}', array('as' => 'supplier.view', 'uses' => 'SupplierController@view'))->before('auth');

Route::get('/supplier/save/{id}', array('as' => 'supplier.save', 'uses' => 'SupplierController@save'))->before('auth');

Route::post('/supplier/save/post/{id}', array('as' => 'supplier.save.post', 'uses' => 'SupplierController@savePost'))->before('auth');

Route::get('/supplier/delete/{id}', array('as' => 'supplier.delete', 'uses' => 'SupplierController@delete'))->before('auth');

Route::get('/suppliers/json', array('as' => 'suppliers.json', 'uses' => 'SupplierController@json'));



Route::get('/suppliers/export', array('as' => 'supplier.export', 'uses' => 'SupplierController@export'))->before('auth');

Route::get('/suppliers/import', array('as' => 'supplier.import', 'uses' => 'SupplierController@import'))->before('auth');





/*Tools

*****************************************************************/

Route::get('/tools', array('as' => 'tools', 'uses' => 'ToolController@all'))->before('auth');

Route::get('/tool/view/{id}', array('as' => 'tool.view', 'uses' => 'ToolController@view'))->before('auth');

Route::get('/tool/save/{id}', array('as' => 'tool.save', 'uses' => 'ToolController@save'))->before('auth');

Route::post('/tool/save/post/{id}', array('as' => 'tool.save.post', 'uses' => 'ToolController@savePost'))->before('auth');

Route::get('/tool/delete/{id}', array('as' => 'tool.delete', 'uses' => 'ToolController@delete'))->before('auth');



Route::get('/tools/export', array('as' => 'tool.export', 'uses' => 'ToolController@export'))->before('auth');

Route::get('/tools/import', array('as' => 'tool.import', 'uses' => 'ToolController@import'))->before('auth');



/*Tool operation

*****************************************************************/

Route::get('/tools/operations', array('as' => 'tools.operations', 'uses' => 'ToolOperationController@all'))->before('auth');

Route::get('/tool/operation/save/{id}', array('as' => 'tool.operation.save', 'uses' => 'ToolOperationController@save'))->before('auth');

Route::post('/tool/operation/save/post/{id}', array('as' => 'tool.operation.save.post', 'uses' => 'ToolOperationController@savePost'))->before('auth');

Route::get('/tool/operation/delete/{id}', array('as' => 'tool.operation.delete', 'uses' => 'ToolOperationController@delete'))->before('auth');

Route::get('/tool/operation/attachment/download/{id}/',array('as' => 'tool.operation.attachment.download', 'uses' => 'ToolOperationController@download'))->before('auth');


/*Units

*****************************************************************/

Route::get('/units', array('as' => 'units', 'uses' => 'UnitController@all'))->before('auth');

Route::get('/unit/view/{id}', array('as' => 'unit.view', 'uses' => 'UnitController@view'))->before('auth');

Route::get('/unit/save/{id}', array('as' => 'unit.save', 'uses' => 'UnitController@save'))->before('auth');

Route::post('/unit/save/post/{id}', array('as' => 'unit.save.post', 'uses' => 'UnitController@savePost'))->before('auth');

Route::get('/unit/delete/{id}', array('as' => 'unit.delete', 'uses' => 'UnitController@delete'))->before('auth');



Route::get('/units/export', array('as' => 'unit.export', 'uses' => 'UnitController@export'))->before('auth');

Route::get('/units/import', array('as' => 'unit.import', 'uses' => 'UnitController@import'))->before('auth');





/*Users

*****************************************************************/

Route::get('/users', array('as' => 'users', 'uses' => 'UserController@all'))->before('auth');

Route::get('/user/view/{id}', array('as' => 'user.view', 'uses' => 'UserController@view'))->before('auth');

Route::get('/user/save/{id}', array('as' => 'user.save', 'uses' => 'UserController@save'))->before('auth');

Route::post('/user/save/post/{id}', array('as' => 'user.save.post', 'uses' => 'UserController@savePost'))->before('auth');

Route::get('/user/delete/{id}', array('as' => 'user.delete', 'uses' => 'UserController@delete'))->before('auth');



Route::get('/users/export', array('as' => 'user.export', 'uses' => 'UserController@export'))->before('auth');

Route::get('/users/import', array('as' => 'user.import', 'uses' => 'UserController@import'))->before('auth');


/* Json

*****************************************************************/

Route::get('/json/divisions/{id}', array('as' => 'json.divisions', 'uses' => 'JsonController@divisions'))->before('auth');

Route::get('/json/sections/{id}/{divisionId}', array('as' => 'json.sections', 'uses' => 'JsonController@sections'))->before('auth');

Route::get('/json/items/{id}/{divisionId}/{sectionId}', array('as' => 'json.items', 'uses' => 'JsonController@items'))->before('auth');

Route::get('/json/materials/{id?}', array('as' => 'json.materials', 'uses' => 'JsonController@materials'))->before('auth');

Route::get('/json/unit/{id?}', array('as' => 'json.unit', 'uses' => 'JsonController@unit'))->before('auth');

Route::get('/json/unit/price/{id?}', array('as' => 'json.unit.price', 'uses' => 'JsonController@unitPrice'))->before('auth');