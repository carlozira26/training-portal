<template>
	<v-dialog v-model="editTraineeModal" max-width="1000">
		<v-card>
			<v-card-title class="display-1 primary darken-4 white--text">
				JFC Training Portal
			</v-card-title>
		</v-card>
		<v-card>
			<v-card-title>
				<v-list-item-title class="headline mb-1 text-center">JFC NEW HIRES INFORMATION FORM</v-list-item-title>
			</v-card-title>
			<v-card-text>
				<v-form ref="vForm" v-on:submit.prevent="submitForm">
					<v-layout class="pb-3">
						<v-flex md12 class="blue darken-4 text-center white--text pa-1">
							<h3>PERSONAL INFORMATION</h3>
						</v-flex>
					</v-layout>
					<v-layout row wrap>
						<v-flex md3 class="pa-5 font-weight-bold">
							FIRST NAME
						</v-flex>
						<v-flex md8>
							<v-text-field solo v-model="form.firstname"></v-text-field>
						</v-flex>
					</v-layout>
					<v-layout row wrap>
						<v-flex md3 class="pa-5 font-weight-bold">
							MIDDLE NAME
						</v-flex>
						<v-flex md8>
							<v-text-field solo v-model="form.middlename"></v-text-field>
						</v-flex>
					</v-layout>
					<v-layout row wrap>
						<v-flex md3 class="pa-5 font-weight-bold">
							LAST NAME
						</v-flex>
						<v-flex md8>
							<v-text-field solo v-model="form.lastname"></v-text-field>
						</v-flex>
					</v-layout>
					<v-layout row wrap>
						<v-flex md3 class="pa-5 font-weight-bold">
							BIRTHDAY
						</v-flex>
						<v-flex md8>
							<v-menu ref="menu" :close-on-content-click="false" transition="scale-transition" min-width="290px">
								<template v-slot:activator="{ on }">
									<v-text-field solo readonly v-on="on" v-model="form.birthday" type="text" :rules="[formRules.required]"/>
								</template>
								<v-date-picker v-model="form.birthday" no-title @change="form.age = getBirthAge(form.birthday)" :max="new Date().toISOString().substr(0, 10)" min="1950-01-01"></v-date-picker>
							</v-menu>
						</v-flex>
					</v-layout>
					<v-layout row wrap>
						<v-flex md3 class="pa-5 font-weight-bold">
							CONTACT NUMBER
						</v-flex>
						<v-flex md8>
							<v-text-field solo v-model="form.contactnum" :rules="[formRules.phoneNumber]"></v-text-field>
						</v-flex>
					</v-layout>
					<v-layout row wrap>
						<v-flex md3 class="pa-5 font-weight-bold">
							ADDRESS
						</v-flex>
						<v-flex md8>
							<v-text-field solo v-model="form.address"></v-text-field>
						</v-flex>
					</v-layout>
					<v-layout row wrap>
						<v-flex md3 class="pa-5 font-weight-bold">
							MUNICIPALITY
						</v-flex>
						<v-flex md8>
							<v-text-field solo v-model="form.municipality"></v-text-field>
						</v-flex>
					</v-layout>
					<v-layout row wrap>
						<v-flex md3 class="pa-5 font-weight-bold">
							AGE
						</v-flex>
						<v-flex md8>
							<v-text-field solo v-model="form.age" readonly></v-text-field>
						</v-flex>
					</v-layout>
					<v-layout row wrap>
						<v-flex md3 class="pa-5 font-weight-bold">
							GENDER
						</v-flex>
						<v-flex md8>
							<v-select solo :items="gender" v-model="form.gender"></v-select>
						</v-flex>
					</v-layout>
					<v-layout row wrap>
						<v-flex md3 class="pa-5 font-weight-bold">
							CIVIL STATUS
						</v-flex>
						<v-flex md8>
							<v-select :items="civilstatus" solo v-model="form.civilstatus"></v-select>
						</v-flex>
					</v-layout>
					<v-layout class="pb-3">
						<v-flex md12 class="blue darken-4 text-center white--text pa-1">
							<h3>EDUCATIONAL BACKGROUND / WORK EXPERIENCE</h3>
						</v-flex>
					</v-layout>
					<v-layout row wrap>
						<v-flex md3 class="pa-5 font-weight-bold">
							EDUCATIONAL LEVEL
						</v-flex>
						<v-flex md8>
							<v-select solo :items="educlevel" v-model="form.educationallevel"></v-select>
						</v-flex>
					</v-layout>
					<v-layout row wrap>
						<v-flex md3 class="pa-5 font-weight-bold">
							COURSE TAKEN
						</v-flex>
						<v-flex md8>
							<v-select solo :items="courses" v-model="form.course"></v-select>
						</v-flex>
					</v-layout>
					<v-layout row wrap>
						<v-flex md3 class="pa-5 font-weight-bold">
							FOOD DELIVERY EXPERIENCE
						</v-flex>
						<v-flex md8>
							<v-select solo :items="yesno" v-model="form.fdexperience"></v-select>
						</v-flex>
					</v-layout>
					<v-layout row wrap>
						<v-flex md3 class="pa-5 font-weight-bold">
							CALL CENTER EXPERIENCE
						</v-flex>
						<v-flex md8>
							<v-select solo :items="yesno" v-model="form.ccexperience"></v-select>
						</v-flex>
					</v-layout>
					<v-layout row wrap>
						<v-flex md3 class="pa-5 font-weight-bold">
							REFERENCE OF APPLICATION
						</v-flex>
						<v-flex md8>
							<v-select solo :items="reference" v-model="form.reference"></v-select>
						</v-flex>
					</v-layout>
					<v-layout class="pb-3">
						<v-flex md12 class="blue darken-4 text-center white--text pa-1">
							<h3>TRAINING INFORMATION</h3>
						</v-flex>
					</v-layout>
					<v-layout row wrap>
						<v-flex md3 class="pa-5 font-weight-bold">
							BATCH NUMBER
						</v-flex>
						<v-flex md8>
							<v-select solo :items="batches" v-model="form.batchnum"></v-select>
						</v-flex>
					</v-layout>
					<v-layout row wrap>
						<v-flex md3 class="pa-5 font-weight-bold">
							ACCOUNT
						</v-flex>
						<v-flex md8>
							<v-select solo :items="accounts" v-model="form.account"></v-select>
						</v-flex>
					</v-layout>
					<v-layout row wrap>
						<v-flex md3 class="pa-5 font-weight-bold">
							SITE
						</v-flex>
						<v-flex md8>
							<v-select solo :items="sites" v-model="form.site"></v-select>
						</v-flex>
					</v-layout>
					<v-layout row wrap>
						<v-flex md3 class="pa-5 font-weight-bold">
							TRAINER
						</v-flex>
						<v-flex md8>
							<v-select solo :items="trainers" v-model="form.trainer"></v-select>
						</v-flex>
					</v-layout>
					<v-layout row wrap>
						<v-flex md3 class="pa-5 font-weight-bold">
							CLASSROOM TRAINING START DATE
						</v-flex>
						<v-flex md8>
							<v-menu ref="menu" :close-on-content-click="false" transition="scale-transition" min-width="290px">
								<template v-slot:activator="{ on }">
									<v-text-field solo readonly v-on="on" v-model="form.ctstartdate" type="text" :rules="[formRules.required]"/>
								</template>
								<v-date-picker v-model="form.ctstartdate" no-title :min="new Date().toISOString().substr(0, 10)"></v-date-picker>
							</v-menu>
						</v-flex>
					</v-layout>
					<v-layout row wrap>
						<v-flex md3 class="pa-5 font-weight-bold">
							CLASSROOM TRAINING END DATE
						</v-flex>
						<v-flex md8>
							<v-menu ref="menu" :close-on-content-click="false" transition="scale-transition" min-width="290px">
								<template v-slot:activator="{ on }">
									<v-text-field solo readonly v-on="on" v-model="form.ctenddate" type="text" :rules="[formRules.required]"/>
								</template>
								<v-date-picker v-model="form.ctenddate" no-title :min="new Date().toISOString().substr(0, 10)"></v-date-picker>
							</v-menu>
						</v-flex>
					</v-layout>
					<v-layout row wrap>
						<v-flex md3 class="pa-5 font-weight-bold">
							NHIP START DATE
						</v-flex>
						<v-flex md8>
							<v-menu ref="menu" :close-on-content-click="false" transition="scale-transition" min-width="290px">
								<template v-slot:activator="{ on }">
									<v-text-field solo readonly v-on="on" v-model="form.nhipstartdate" type="text" :rules="[formRules.required]"/>
								</template>
								<v-date-picker v-model="form.nhipstartdate" no-title :min="new Date().toISOString().substr(0, 10)"></v-date-picker>
							</v-menu>
						</v-flex>
					</v-layout>
					<v-layout row wrap>
						<v-flex md3 class="pa-5 font-weight-bold">
							NHIP END DATE
						</v-flex>
						<v-flex md8>
							<v-menu ref="menu" :close-on-content-click="false" transition="scale-transition" min-width="290px">
								<template v-slot:activator="{ on }">
									<v-text-field solo readonly v-on="on" v-model="form.nhipenddate" type="text" :rules="[formRules.required]"/>
								</template>
								<v-date-picker v-model="form.nhipenddate" no-title :min="new Date().toISOString().substr(0, 10)"></v-date-picker>
							</v-menu>
						</v-flex>
					</v-layout>
					<v-layout row wrap>
						<v-flex md3 class="pa-5 font-weight-bold">
							PROJECT BASE DATE
						</v-flex>
						<v-flex md8>
							<v-menu ref="menu" :close-on-content-click="false" transition="scale-transition" min-width="290px">
								<template v-slot:activator="{ on }">
									<v-text-field solo readonly v-on="on" v-model="form.pbdate" type="text" :rules="[formRules.required]"/>
								</template>
								<v-date-picker v-model="form.pbdate" no-title :min="new Date().toISOString().substr(0, 10)"></v-date-picker>
							</v-menu>
						</v-flex>
					</v-layout>
					<v-layout row wrap>
						<v-flex md3 class="pa-5 font-weight-bold">
							TRAINING STATUS
						</v-flex>
						<v-flex md8>
							<v-select solo :items="trainingstatus" v-model="form.trainingstatus"></v-select>
						</v-flex>
					</v-layout>
					<v-layout row wrap>
						<v-flex md3 class="pa-5 font-weight-bold">
							REASON OF ATTRITION
						</v-flex>
						<v-flex md8>
							<v-select solo :items="attritions" v-model="form.reasonofattr"></v-select>
						</v-flex>
					</v-layout>
					<v-layout class="pb-3">
						<v-flex md12 class="blue darken-4 text-center white--text pa-1">
							<h3>TRAINING PERIOD PERFORMANCE RATINGS</h3>
						</v-flex>
					</v-layout>
					<v-layout row wrap>
						<v-flex md3 class="pa-5 font-weight-bold">
							AHT
						</v-flex>
						<v-flex md8>
							<v-text-field solo v-model="form.aht"></v-text-field>
						</v-flex>
					</v-layout>
					<v-layout row wrap>
						<v-flex md3 class="pa-5 font-weight-bold">
							QA GRADE
						</v-flex>
						<v-flex md8>
							<v-text-field solo v-model="form.qagrade"></v-text-field>
						</v-flex>
					</v-layout>
					<v-layout row wrap>
						<v-flex md3 class="pa-5 font-weight-bold">
							TOTAL TC
						</v-flex>
						<v-flex md8>
							<v-text-field solo v-model="form.totaltc"></v-text-field>
						</v-flex>
					</v-layout>
					<v-layout row wrap>
						<v-flex md3 class="pa-5 font-weight-bold">
							AVE. TC
						</v-flex>
						<v-flex md8>
							<v-text-field solo v-model="form.avetc"></v-text-field>
						</v-flex>
					</v-layout>
					<v-layout row wrap>
						<v-flex md3 class="pa-5 font-weight-bold">
							COMPLAINT COUNT
						</v-flex>
						<v-flex md8>
							<v-text-field solo v-model="form.complaintcount"></v-text-field>
						</v-flex>
					</v-layout>
					<v-layout row wrap>
						<v-flex md3 class="pa-5 font-weight-bold">
							COMPLAINT OVER TC
						</v-flex>
						<v-flex md8>
							<v-text-field solo v-model="form.complaintovertc"></v-text-field>
						</v-flex>
					</v-layout>
					<v-layout row wrap>
						<v-flex md3 class="pa-5 font-weight-bold">
							ABSENCES COUNT
						</v-flex>
						<v-flex md8>
							<v-text-field solo v-model="form.absencecount"></v-text-field>
						</v-flex>
					</v-layout>
					<v-layout row wrap>
						<v-flex md3 class="pa-5 font-weight-bold">
							TARDINESS COUNT
						</v-flex>
						<v-flex md8>
							<v-text-field solo v-model="form.tardinesscount"></v-text-field>
						</v-flex>
					</v-layout>
					<v-layout row wrap>
						<v-flex md3 class="pa-5 font-weight-bold">
							RELIABILITY
						</v-flex>
						<v-flex md8>
							<v-text-field solo v-model="form.reliability"></v-text-field>
						</v-flex>
					</v-layout>
					<v-layout class="pb-3">
						<v-flex md12 class="blue darken-4 text-center white--text pa-1">
							<h3>USER CREDENTIALS</h3>
						</v-flex>
					</v-layout>
					<v-layout row wrap>
						<v-flex md3 class="pa-5 font-weight-bold">
							AGENTSITE
						</v-flex>
						<v-flex md8>
							<v-text-field solo v-model="form.agentsite"></v-text-field>
						</v-flex>
					</v-layout>
					<v-layout row wrap>
						<v-flex md3 class="pa-5 font-weight-bold">
							NGUCC
						</v-flex>
						<v-flex md8>
							<v-text-field solo v-model="form.ngucc"></v-text-field>
						</v-flex>
					</v-layout>
					<v-layout row wrap>
						<v-flex md3 class="pa-5 font-weight-bold">
							IRONMAN
						</v-flex>
						<v-flex md8>
							<v-text-field solo v-model="form.ironman"></v-text-field>
						</v-flex>
					</v-layout>
					<v-layout row wrap>
						<v-flex md3 class="pa-5 font-weight-bold">
							XAVIER
						</v-flex>
						<v-flex md8>
							<v-text-field solo v-model="form.xavier"></v-text-field>
						</v-flex>
					</v-layout>
					<v-layout row wrap>
						<v-flex md3 class="pa-5 font-weight-bold">
							CRM
						</v-flex>
						<v-flex md8>
							<v-text-field solo v-model="form.crm"></v-text-field>
						</v-flex>
					</v-layout>
				</v-form>
			</v-card-text>
			<v-card-actions>
				<v-spacer></v-spacer>
				<template v-if="submitTempl == false">
					<v-btn class="ma-1 error darken-4">CLEAR</v-btn>
					<v-btn class="ma-1 primary darken-4" @click="submitForm">SAVE</v-btn>
				</template>
				<template v-else>
					<v-btn disabled>CLEAR</v-btn>
					<v-btn disabled>
						<v-progress-circular color="primary" indeterminate></v-progress-circular>
					</v-btn>
				</template>
			</v-card-actions>
		</v-card>
	</v-dialog>
</template>
<script>
import axios from 'axios';
import VueCookies from 'vue-cookies';
	export default {
		mounted : function(){
			this.eventHub.$on('showTraineeDetails', val =>{
				let trainee = val.traineeDetails;
				this.editTraineeModal = true;

				this.edit = 1;
				this.form.id = trainee.id;
				this.form.firstname = trainee.firstname;
				this.form.middlename = trainee.middlename;
				this.form.lastname = trainee.lastname;
				this.form.birthday = trainee.birthday;
				this.form.contactnum = trainee.contactnumber;
				this.form.address = trainee.address;
				this.form.municipality = trainee.municipality;
				this.form.age = this.getBirthAge(trainee.birthday);
				this.form.gender = trainee.gender;
				this.form.civilstatus = trainee.civilstatus;
				this.form.educationallevel = trainee.educationallevel;
				this.form.course = trainee.coursetaken;
				this.form.fdexperience = trainee.fdexperience;
				this.form.ccexperience = trainee.ccexperience;
				this.form.reference = trainee.reference;
				this.form.batchnum = trainee.batchnumber;
				this.form.account = trainee.account;
				this.form.site = trainee.site;
				this.form.trainer = trainee.trainer;
				this.form.ctstartdate = trainee.ctstartdate;
				this.form.ctenddate = trainee.ctenddate;
				this.form.nhipstartdate = trainee.nhipstartdate;
				this.form.nhipenddate = trainee.nhipenddate;
				this.form.pbdate = trainee.pbdate;
				this.form.trainingstatus = trainee.trainingstatus;
				this.form.reasonofattr = trainee.reason;
				this.form.aht = trainee.aht;
				this.form.qagrade = trainee.qagrade;
				this.form.totaltc = trainee.totaltc;
				this.form.avetc = trainee.avetc;
				this.form.complaintcount = trainee.complaintcount;
				this.form.complaintovertc = trainee.complaintovertc;
				this.form.absencecount = trainee.absencescount;
				this.form.tardinesscount = trainee.tardinesscount;
				this.form.reliability = trainee.reliability;
				this.form.agentsite = trainee.agentsite;
				this.form.ngucc = trainee.ngucc;
				this.form.ironman = trainee.ironman;
				this.form.xavier = trainee.xavier;
				this.form.crm = trainee.crm;
			});
		},
		created : function (){
			this.fetchLookup();
		},
		data : function (){
			return {
				submitTempl : false,
				edit : 0,
				lookup : [],
				yesno : ['Yes','No'],
				form : {
					id : '',
					firstname : '',
					middlename : '',
					lastname : '',
					birthday : '',
					contactnum : '',
					address : '',
					municipality : '',
					age : '',
					gender : '',
					civilstatus : '',
					educationallevel : '',
					course : '',
					fdexperience : '',
					ccexperience : '',
					reference : '',
					batchnum : '',
					account : '',
					site : '',
					trainer : '',
					ctstartdate : '',
					ctenddate : '',
					nhipstartdate : '',
					nhipenddate : '',
					pbdate : '',
					trainingstatus : '',
					reasonofattr : '',
					aht : '',
					qagrade : '',
					totaltc : '',
					avetc : '',
					complaintcount : '',
					complaintovertc : '',
					absencecount : '',
					tardinesscount : '',
					reliability : '',
					agentsite : '',
					ngucc : '',
					ironman : '',
					xavier : '',
					crm : ''
				},
				batches:[],
				gender : [],
				civilstatus : [],
				educlevel : [],
				courses: [],
				reference : [],
				accounts : [],
				sites : [],
				trainers : [],
				trainingstatus : [],
				attritions : [],
				editTraineeModal : false,
			}
		},
		methods : {
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
						if(_this.lookup[i].type == "gender"){
							_this.gender.push(_this.lookup[i].name);
						}
						if(_this.lookup[i].type == "civilstatus"){
							_this.civilstatus.push(_this.lookup[i].name);
						}
						if(_this.lookup[i].type == "educationallevel"){
							_this.educlevel.push(_this.lookup[i].name);
						}
						if(_this.lookup[i].type == "course"){
							_this.courses.push(_this.lookup[i].name);
						}
						if(_this.lookup[i].type == "reference"){
							_this.reference.push(_this.lookup[i].name);
						}
						if(_this.lookup[i].type == "account"){
							_this.accounts.push(_this.lookup[i].name);
						}
						if(_this.lookup[i].type == "site"){
							_this.sites.push(_this.lookup[i].name);
						}
						if(_this.lookup[i].type == "trainer"){
							_this.trainers.push(_this.lookup[i].name);
						}
						if(_this.lookup[i].type == "trainingstatus"){
							_this.trainingstatus.push(_this.lookup[i].name);
						}
						if(_this.lookup[i].type == "account"){
							_this.accounts.push(_this.lookup[i].name);
						}
						if(_this.lookup[i].type == "attrition"){
							_this.attritions.push(_this.lookup[i].name);
						}
						if(_this.lookup[i].type == "batch"){
							_this.batches.push(_this.lookup[i].name);
						}
					}
				});
			},
			submitForm : function(){
				this.submitTempl = true;
				let _this = this,
				formData = new FormData();

				formData.append('edit', this.edit);
				formData.append('id', this.form.id);
				formData.append('firstname', this.form.firstname);
				formData.append('middlename', this.form.middlename);
				formData.append('lastname', this.form.lastname);
				formData.append('birthday', this.form.birthday);
				formData.append('contactnum', this.form.contactnum);
				formData.append('address', this.form.address);
				formData.append('municipality', this.form.municipality);
				formData.append('gender', this.form.gender);
				formData.append('civilstatus', this.form.civilstatus);
				formData.append('educationallevel', this.form.educationallevel);
				formData.append('course', this.form.course);
				formData.append('fdexperience', this.form.fdexperience);
				formData.append('ccexperience', this.form.ccexperience);
				formData.append('reference', this.form.reference);
				formData.append('batchnum', this.form.batchnum);
				formData.append('account', this.form.account);
				formData.append('site', this.form.site);
				formData.append('trainer', this.form.trainer);
				formData.append('ctstartdate', this.form.ctstartdate);
				formData.append('ctenddate', this.form.ctenddate);
				formData.append('nhipstartdate', this.form.nhipstartdate);
				formData.append('nhipenddate', this.form.nhipenddate);
				formData.append('pbdate', this.form.pbdate);
				formData.append('trainingstatus', this.form.trainingstatus);
				formData.append('reasonofattr', this.form.reasonofattr);
				formData.append('aht', this.form.aht);
				formData.append('qagrade', this.form.qagrade);
				formData.append('totaltc', this.form.totaltc);
				formData.append('avetc', this.form.avetc);
				formData.append('complaintcount', this.form.complaintcount);
				formData.append('complaintovertc', this.form.complaintovertc);
				formData.append('absencescount', this.form.absencecount);
				formData.append('tardinesscount', this.form.tardinesscount);
				formData.append('reliability', this.form.reliability);
				formData.append('agentsite', this.form.agentsite);
				formData.append('ngucc', this.form.ngucc);
				formData.append('ironman', this.form.ironman);
				formData.append('xavier', this.form.xavier);
				formData.append('crm', this.form.crm);
				axios.create({
					baseURL : this.apiUrl,
					headers : { }
				})
				.post('/form/submit', formData)
				.then(function(res){
					_this.editTraineeModal = false;
					_this.eventHub.$emit('showSnackBar', {icon : 'check', snackBarColor : 'primary', message : 'Successfully Edited!'})
					_this.eventHub.$emit('traineeModal', true);
					_this.submitTempl = false;
				});
			},
			
		},
	};
</script>