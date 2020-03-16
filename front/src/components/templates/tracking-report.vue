<template>
	<div>
		<v-card flat>
			<v-card-title class="headline mb-1">
					JFC NEW HIRES TRACKING REPORT
				<v-spacer></v-spacer>
				<v-btn class="primary ma-1" title="Add Lookup" @click="lookupmodal=true"><v-icon>fa-plus</v-icon></v-btn>
				<download-excel :data   = "traineesList" name="Trainees List.xls" :fields="json_fields">
					<v-btn class="primary ma-1" title="Download"><v-icon>fa-download</v-icon></v-btn>
				</download-excel>
				
			</v-card-title>
			<v-card-text>
				<v-layout>
					<v-flex md2 class="pl-1">
						<label class="subtitle-1">Batch</label>
						<v-select label="Search by Batch" :items="batches" v-model="batch" solo></v-select>
					</v-flex>
					<v-flex md2 class="pl-1">
						<label class="subtitle-1">Account</label>
						<v-select label="Search by Account" :items="accounts" @change="fetchTrainees" v-model="account" solo></v-select>
					</v-flex>
					<v-flex md2 class="pl-1">
						<label class="subtitle-1">Site</label>
						<v-select label="Search by Site" :items="sites" @change="fetchTrainees" v-model="site" solo></v-select>
					</v-flex>
				</v-layout>
			</v-card-text>
			<v-card-text style="overflow-y:auto;">
				<table class="v-datatable v-table" id="tbl" style="width:100%;border-collapse:collapse">
					<thead>
						<tr>
							<th>FIRST NAME</th>
							<th>MIDDLE NAME</th>
							<th>LAST NAME</th>
							<th>BIRTHDAY</th>
							<th>CONTACT NUMBER</th>
							<th>ADDRESS</th>
							<th>MUNICIPALITY</th>
							<th>AGE</th>
							<th>GENDER</th>
							<th>CIVIL STATUS</th>
							<th>EDUCATIONAL LEVEL</th>
							<th>FOOD DELIVERY EXPERIENCE</th>
							<th>CALL CENTER EXPERIENCE</th>
							<th>REFERENCE OF APPLICATION</th>
							<th>BATCH NUMBER</th>
							<th>ACCOUNT</th>
							<th>SITE</th>
							<th>TRAINER</th>
							<th>CLASSROOM TRAINING START DATE</th>
							<th>CLASSROOM TRAINING END DATE</th>
							<th>NHIP START DATE</th>
							<th>NHIP END DATE</th>
							<th>PROJECT BASE DATE</th>
							<th>TRAINING STATUS</th>
							<th>REASON OF ATTRITION</th>
							<th>AHT</th>
							<th>QA GRADE</th>
							<th>TOTAL TC</th>
							<th>AVE TC</th>
							<th>COMPLAINT COUNT</th>
							<th>COMPLAINT OVER TC</th>
							<th>ABSENCES COUNT</th>
							<th>TARDINESS COUNT</th>
							<th>RELIABILITY</th>
							<th>AGENTSITE</th>
							<th>NGUCC</th>
							<th>IRONMAN</th>
							<th>XAVIER</th>
							<th>CRM</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="(trainee,index) in traineesList" v-bind:key="index" @click="editTrainee(index)">
							<td>{{trainee.firstname}}</td>
							<td>{{trainee.middlename}}</td>
							<td>{{trainee.lastname}}</td>
							<td>{{trainee.birthday}}</td>
							<td>{{trainee.contactnumber}}</td>
							<td>{{trainee.address}}</td>
							<td>{{trainee.municipality}}</td>
							<td>{{trainee.age}}</td>
							<td>{{trainee.gender}}</td>
							<td>{{trainee.civilstatus}}</td>
							<td>{{trainee.educationallevel}}</td>
							<td>{{trainee.fdexperience}}</td>
							<td>{{trainee.ccexperience}}</td>
							<td>{{trainee.reference}}</td>
							<td>{{trainee.batchnumber}}</td>
							<td>{{trainee.account}}</td>
							<td>{{trainee.site}}</td>
							<td>{{trainee.trainer}}</td>
							<td>{{trainee.ctstartdate}}</td>
							<td>{{trainee.ctenddate}}</td>
							<td>{{trainee.nhipstartdate}}</td>
							<td>{{trainee.nhipenddate}}</td>
							<td>{{trainee.pbdate}}</td>
							<td>{{trainee.trainingstatus}}</td>
							<td>{{trainee.reason}}</td>
							<td>{{trainee.aht}}</td>
							<td>{{trainee.qagrade}}</td>
							<td>{{trainee.totaltc}}</td>
							<td>{{trainee.avetc}}</td>
							<td>{{trainee.complaintcount}}</td>
							<td>{{trainee.complaintovertc}}</td>
							<td>{{trainee.absencescount}}</td>
							<td>{{trainee.tardinesscount}}</td>
							<td>{{trainee.reliability}}</td>
							<td>{{trainee.agentsite}}</td>
							<td>{{trainee.ngucc}}</td>
							<td>{{trainee.ironman}}</td>
							<td>{{trainee.xavier}}</td>
							<td>{{trainee.crm}}</td>
						</tr>
					</tbody>
				</table>
			</v-card-text>
		</v-card>
		<v-dialog v-model="lookupmodal" max-width="600">
			<v-card>
				<v-card-title class="headline">Add Lookup</v-card-title>
				<v-card-text>
					<v-form ref="vForm" v-on:submit.prevent="submitLookup">
						<v-layout row wrap>
							<v-flex md4 class="pa-4">Lookup Type</v-flex>
							<v-flex md7><v-select :items="typeList" :rules="[formRules.required]" solo v-model="lookuptype" label="Select here"></v-select></v-flex>
							<v-flex md4 class="pa-4">Lookup Name</v-flex>
							<v-flex md7><v-text-field solo :rules="[formRules.required]" v-model="lookupname"></v-text-field></v-flex>
						</v-layout>
					</v-form>
				</v-card-text>
				<v-card-actions>
					<v-spacer></v-spacer>
					<v-btn large class="primary" @click="submitLookup">Add</v-btn>
				</v-card-actions>
			</v-card>
		</v-dialog>
		<form-component></form-component>
	</div>
</template>
<script>
    import VueCookies from 'vue-cookies';
    import formComponent from './edit-form.vue';
    import axios from 'axios';
    import Vue from 'vue';
	import JsonExcel from 'vue-json-excel';

	Vue.component('downloadExcel', JsonExcel);
    export default {
		components:{
			'form-component' : formComponent,
		},
        created : function(){
			this.fetchTrainees();
			this.fetchLookup();
			this.eventHub.$on('traineeModal', val =>{
				this.fetchTrainees();
			});
        },
        data: function(){
            return {
                batch : '',
                account : '',
                site : '',
                traineesList : [],
                accounts : ['All'],
                sites : ['All'],
                batches : ['All'],
                lookupmodal : false,
                editTraineeModal : false,
                typeList : ['Batch','Account','Site'],

                lookuptype : '',
                lookupname : '',
                trainee : [],
                json_fields : {
					'First Name' : 'firstname',
					'Middle Name' : 'middlename',
					'Last Name' : 'lastname',
					'Birthday' : 'birthday',
					'Contact Number' : 'contactnumber',
					'Address' : 'address',
					'Municipality' : 'municipality',
					'Age' : 'age',
					'Gender' : 'gender',
					'Civil Status' : 'civilstatus',
					'Educational Level' : 'educationallevel',
					'Food Delivery Experience' : 'fdexperience',
					'Call Center Experience' : 'ccexperience',
					'Reference of Application' : 'reference',
					'Batch Number' : 'batchnumber',
					'Account' : 'account',
					'Site' : 'site',
					'Trainer' : 'trainer',
					'Classroom Training Start Date' : 'ctstartdate',
					'Classroom Training End Date' : 'ctenddate',
					'NHIP Start Date' : 'nhipstartdate',
					'NHIP End Date' : 'nhipenddate',
					'Project Base Date' : 'pbdate',
					'Training Status' : 'trainingstatus',
					'Reason of Attrition' : 'reason',
					'AHT' : 'aht',
					'QA Grade' : 'qagrade',
					'Total TC' : 'totaltc',
					'Average TC' : 'avetc',
					'Complaint Count' : 'complaintcount',
					'Complaint Over TC' : 'complaintovertc',
					'Absences Count' : 'absencescount',
					'Tardiness Count' : 'tardinesscount',
					'Reliability' : 'reliability',
					'Agentsite' : 'agentsite',
					'NGUCC' : 'ngucc',
					'Ironman' : 'ironman',
					'Xavier' : 'xavier',
					'CRM' : 'crm'
                }
            }
        },
        methods : {
            fetchTrainees : function(){
				let _this = this;
				axios.create({
					baseURL : this.apiUrl,
					headers : {
						'Authorization': `Bearer ${this.token}`
					}
				})
				.get('/trainees/fetch',{
					params : {
						batch : this.batch,
						account : this.account,
						site : this.site,
					}
				})
				.then(function(res){
					_this.traineesList = res.data.data;
					for(let i in _this.traineesList){
						_this.traineesList[i].age = _this.getBirthAge(_this.traineesList[i].birthday);
					}
				})
            },
            fetchLookup : function () {
				let _this = this;
				axios.create({
					baseURL : this.apiUrl,
					headers : { }
				})
				.get('/form/lookup')
				.then(function(res){
					_this.lookup = res.data.data;
					for(let i in _this.lookup){
						if(_this.lookup[i].type == "account"){
							_this.accounts.push(_this.lookup[i].name);
						}
						if(_this.lookup[i].type == "site"){
							_this.sites.push(_this.lookup[i].name);
						}
						if(_this.lookup[i].type == "batch"){
							_this.batches.push(_this.lookup[i].name);
						}
					}
				});
			},
			submitLookup : function(){
				let _this = this,
				formData = new FormData();
				formData.append("type",this.lookuptype);
				formData.append("name",this.lookupname);

				if(this.$refs.vForm.validate()){
					axios.create({
						baseURL : this.apiUrl,
						headers: {
							'Authorization' : `Bearer ${this.token}`
						}
					})
					.post('/lookup/submit',formData)
					.then(function(res){
						_this.eventHub.$emit('showSnackBar', { icon : 'check', snackBarColor : 'primary', message : res.data.message })
						_this.lookupmodal = false;
						_this.fetchLookup();
					})
				}
			},
			editTrainee : function(i){
				this.trainee = this.traineesList[i];
				this.eventHub.$emit('showTraineeDetails', { traineeDetails : this.traineesList[i] });
				this.editTraineeModal = true;
			},
        }
    };
</script>
<style>
	#tbl {
		font-family: arial, sans-serif;
		border-collapse: collapse;
		width: auto;
	}
	#tbl td{
		border: 1px solid #007ac0;
		text-align: center;
		padding: 8px;
		width:100%;
	}
	#tbl th {
		border: 1px solid #007ac0;
		text-align: center;
		padding: 8px;
		width:100%;
		background-color: #2f74b5;
		color: #fff;
	}
	#tbl tr:nth-child(even) {
		background-color: #dddddd;
	}
</style>