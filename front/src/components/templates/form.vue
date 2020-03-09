<template>
	<v-card flat>
		<v-card-title>
			<v-list-item-title class="headline mb-1">JFC NEW HIRES INFORMATION FORM</v-list-item-title>
		</v-card-title>
		<v-card-text>
			<v-form ref="vForm" v-on:submit.prevent="submitForm">
				<v-layout class="pb-3">
					<v-flex md6 class="blue darken-4 text-center white--text pa-1">
						<h3>PERSONAL INFORMATION</h3>
					</v-flex>
				</v-layout>
				<v-layout row wrap>
					<v-flex md2 class="pa-3">
						FIRST NAME
					</v-flex>
					<v-flex md4>
						<v-text-field solo v-model="form.firstname"></v-text-field>
					</v-flex>
				</v-layout>
				<v-layout row wrap>
					<v-flex md2 class="pa-3">
						MIDDLE NAME
					</v-flex>
					<v-flex md4>
						<v-text-field solo v-model="form.middlename"></v-text-field>
					</v-flex>
				</v-layout>
				<v-layout row wrap>
					<v-flex md2 class="pa-3">
						LAST NAME
					</v-flex>
					<v-flex md4>
						<v-text-field solo v-model="form.lastname"></v-text-field>
					</v-flex>
				</v-layout>
				<v-layout row wrap>
					<v-flex md2 class="pa-3">
						BIRTHDAY
					</v-flex>
					<v-flex md4>
						<v-text-field solo v-model="form.birthday"></v-text-field>
					</v-flex>
				</v-layout>
				<v-layout row wrap>
					<v-flex md2 class="pa-3">
						CONTACT NUMBER
					</v-flex>
					<v-flex md4>
						<v-text-field solo v-model="form.contactnum"></v-text-field>
					</v-flex>
				</v-layout>
				<v-layout row wrap>
					<v-flex md2 class="pa-3">
						ADDRESS
					</v-flex>
					<v-flex md4>
						<v-text-field solo v-model="form.address"></v-text-field>
					</v-flex>
				</v-layout>
				<v-layout row wrap>
					<v-flex md2 class="pa-3">
						MUNICIPALITY
					</v-flex>
					<v-flex md4>
						<v-text-field solo v-model="form.municipality"></v-text-field>
					</v-flex>
				</v-layout>
				<v-layout row wrap>
					<v-flex md2 class="pa-3">
						AGE
					</v-flex>
					<v-flex md4>
						<v-text-field solo v-model="form.age" readonly></v-text-field>
					</v-flex>
				</v-layout>
				<v-layout row wrap>
					<v-flex md2 class="pa-3">
						GENDER
					</v-flex>
					<v-flex md4>
						<v-select solo :items="gender" v-model="form.gender"></v-select>
					</v-flex>
				</v-layout>
				<v-layout row wrap>
					<v-flex md2 class="pa-3">
						CIVIL STATUS
					</v-flex>
					<v-flex md4>
						<v-select :items="civilstatus" solo v-model="form.civilstatus"></v-select>
					</v-flex>
				</v-layout>
				<v-layout class="pb-3">
					<v-flex md6 class="blue darken-4 text-center white--text pa-1">
						<h3>EDUCATIONAL BACKGROUND / WORK EXPERIENCE</h3>
					</v-flex>
				</v-layout>
				<v-layout row wrap>
					<v-flex md2 class="pa-3">
						EDUCATIONAL LEVEL
					</v-flex>
					<v-flex md4>
						<v-select solo :items="educlevel" v-model="form.educationallevel"></v-select>
					</v-flex>
				</v-layout>
				<v-layout row wrap>
					<v-flex md2 class="pa-3">
						COURSE TAKEN
					</v-flex>
					<v-flex md4>
						<v-select solo :items="courses" v-model="form.course"></v-select>
					</v-flex>
				</v-layout>
				<v-layout row wrap>
					<v-flex md2 class="pa-3">
						FOOD DELIVERY EXPERIENCE
					</v-flex>
					<v-flex md4>
						<v-select solo :items="yesno" v-model="form.fdexperience"></v-select>
					</v-flex>
				</v-layout>
				<v-layout row wrap>
					<v-flex md2 class="pa-3">
						CALL CENTER EXPERIENCE
					</v-flex>
					<v-flex md4>
						<v-select solo :items="yesno" v-model="form.ccexperience"></v-select>
					</v-flex>
				</v-layout>
				<v-layout row wrap>
					<v-flex md2 class="pa-3">
						REFERENCE OF APPLICATION
					</v-flex>
					<v-flex md4>
						<v-select solo :items="reference" v-model="form.reference"></v-select>
					</v-flex>
				</v-layout>
				<v-layout class="pb-3">
					<v-flex md6 class="blue darken-4 text-center white--text pa-1">
						<h3>TRAINING INFORMATION</h3>
					</v-flex>
				</v-layout>
				<v-layout row wrap>
					<v-flex md2 class="pa-3">
						BATCH NUMBER
					</v-flex>
					<v-flex md4>
						<v-select solo v-model="form.batchnum"></v-select>
					</v-flex>
				</v-layout>
				<v-layout row wrap>
					<v-flex md2 class="pa-3">
						ACCOUNT
					</v-flex>
					<v-flex md4>
						<v-select solo :items="accounts" v-model="form.account"></v-select>
					</v-flex>
				</v-layout>
				<v-layout row wrap>
					<v-flex md2 class="pa-3">
						SITE
					</v-flex>
					<v-flex md4>
						<v-select solo :items="sites" v-model="form.site"></v-select>
					</v-flex>
				</v-layout>
				<v-layout row wrap>
					<v-flex md2 class="pa-3">
						TRAINER
					</v-flex>
					<v-flex md4>
						<v-select solo :items="trainers" v-model="form.trainer"></v-select>
					</v-flex>
				</v-layout>
				<v-layout row wrap>
					<v-flex md2 class="pa-3">
						CLASSROOM TRAINING START DATE
					</v-flex>
					<v-flex md4>
						<v-text-field solo v-model="form.ctstartdate"></v-text-field>
					</v-flex>
				</v-layout>
				<v-layout row wrap>
					<v-flex md2 class="pa-3">
						CLASSROOM TRAINING END DATE
					</v-flex>
					<v-flex md4>
						<v-text-field solo v-model="form.ctenddate"></v-text-field>
					</v-flex>
				</v-layout>
				<v-layout row wrap>
					<v-flex md2 class="pa-3">
						NHIP START DATE
					</v-flex>
					<v-flex md4>
						<v-text-field solo v-model="form.nhipstartdate"></v-text-field>
					</v-flex>
				</v-layout>
				<v-layout row wrap>
					<v-flex md2 class="pa-3">
						NHIP END DATE
					</v-flex>
					<v-flex md4>
						<v-text-field solo v-model="form.nhipenddate"></v-text-field>
					</v-flex>
				</v-layout>
				<v-layout row wrap>
					<v-flex md2 class="pa-3">
						PROJECT BASE DATE
					</v-flex>
					<v-flex md4>
						<v-text-field solo v-model="form.pbdate"></v-text-field>
					</v-flex>
				</v-layout>
				<v-layout row wrap>
					<v-flex md2 class="pa-3">
						TRAINING STATUS
					</v-flex>
					<v-flex md4>
						<v-select solo :items="trainingstatus" v-model="form.trainingstatus"></v-select>
					</v-flex>
				</v-layout>
				<v-layout row wrap>
					<v-flex md2 class="pa-3">
						REASON OF ATTRITION
					</v-flex>
					<v-flex md4>
						<v-select solo :items="attritions" v-model="form.reasonofattr"></v-select>
					</v-flex>
				</v-layout>
				<v-layout class="pb-3">
					<v-flex md6 class="blue darken-4 text-center white--text pa-1">
						<h3>TRAINING PERIOD PERFORMANCE RATINGS</h3>
					</v-flex>
				</v-layout>
				<v-layout row wrap>
					<v-flex md2 class="pa-3">
						AHT
					</v-flex>
					<v-flex md4>
						<v-text-field solo v-model="form.aht"></v-text-field>
					</v-flex>
				</v-layout>
				<v-layout row wrap>
					<v-flex md2 class="pa-3">
						QA GRADE
					</v-flex>
					<v-flex md4>
						<v-text-field solo v-model="form.qagrade"></v-text-field>
					</v-flex>
				</v-layout>
				<v-layout row wrap>
					<v-flex md2 class="pa-3">
						TOTAL TC
					</v-flex>
					<v-flex md4>
						<v-text-field solo v-model="form.totaltc"></v-text-field>
					</v-flex>
				</v-layout>
				<v-layout row wrap>
					<v-flex md2 class="pa-3">
						AVE. TC
					</v-flex>
					<v-flex md4>
						<v-text-field solo v-model="form.avetc"></v-text-field>
					</v-flex>
				</v-layout>
				<v-layout row wrap>
					<v-flex md2 class="pa-3">
						COMPLAINT COUNT
					</v-flex>
					<v-flex md4>
						<v-text-field solo v-model="form.complaintcount"></v-text-field>
					</v-flex>
				</v-layout>
				<v-layout row wrap>
					<v-flex md2 class="pa-3">
						COMPLAINT OVER TC
					</v-flex>
					<v-flex md4>
						<v-text-field solo v-model="form.complaintovertc"></v-text-field>
					</v-flex>
				</v-layout>
				<v-layout row wrap>
					<v-flex md2 class="pa-3">
						ABSENCES COUNT
					</v-flex>
					<v-flex md4>
						<v-text-field solo v-model="form.absencecount"></v-text-field>
					</v-flex>
				</v-layout>
				<v-layout row wrap>
					<v-flex md2 class="pa-3">
						TARDINESS COUNT
					</v-flex>
					<v-flex md4>
						<v-text-field solo v-model="form.tardinesscount"></v-text-field>
					</v-flex>
				</v-layout>
				<v-layout row wrap>
					<v-flex md2 class="pa-3">
						RELIABILITY
					</v-flex>
					<v-flex md4>
						<v-text-field solo v-model="form.reliability"></v-text-field>
					</v-flex>
				</v-layout>
				<v-layout class="pb-3">
					<v-flex md6 class="blue darken-4 text-center white--text pa-1">
						<h3>USER CREDENTIALS</h3>
					</v-flex>
				</v-layout>
				<v-layout row wrap>
					<v-flex md2 class="pa-3">
						AGENTSITE
					</v-flex>
					<v-flex md4>
						<v-text-field solo v-model="form.agentsite"></v-text-field>
					</v-flex>
				</v-layout>
				<v-layout row wrap>
					<v-flex md2 class="pa-3">
						NGUCC
					</v-flex>
					<v-flex md4>
						<v-text-field solo v-model="form.ngucc"></v-text-field>
					</v-flex>
				</v-layout>
				<v-layout row wrap>
					<v-flex md2 class="pa-3">
						IRONMAN
					</v-flex>
					<v-flex md4>
						<v-text-field solo v-model="form.ironman"></v-text-field>
					</v-flex>
				</v-layout>
				<v-layout row wrap>
					<v-flex md2 class="pa-3">
						XAVIER
					</v-flex>
					<v-flex md4>
						<v-text-field solo v-model="form.xavier"></v-text-field>
					</v-flex>
				</v-layout>
				<v-layout row wrap>
					<v-flex md2 class="pa-3">
						CRM
					</v-flex>
					<v-flex md4>
						<v-text-field solo v-model="form.crm"></v-text-field>
					</v-flex>
				</v-layout>
			</v-form>
		</v-card-text>
		<v-card-actions>
			<v-layout row wrap>
				<v-flex md6 text-center class="pa-3">
					<v-btn class="ma-1 error darken-4">CLEAR</v-btn>
					<v-btn class="ma-1 primary darken-4" @click="submitForm">SAVE</v-btn>
				</v-flex>
			</v-layout>
		</v-card-actions>
	</v-card>
</template>
<script>
import axios from 'axios';
import VueCookies from 'vue-cookies';
	export default {
		created : function (){
			this.token = VueCookies.get(this.cookieKey).token;
			this.fetchLookup();
		},
		data : function (){
			return {
				lookup : [],
				yesno : ['Yes','No'],
				form : {
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

			}
		},
		methods : {
			fetchLookup : function () {
				let _this = this;
				axios.create({
					baseURL : this.apiUrl,
					headers : {
						'Authorization' : `Bearer ${this.token}`
					}
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
					}
				});
			},
			submitForm : function(){
				let _this = this,
				formData = new FormData();

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
				formData.append('absencecount', this.form.absencecount);
				formData.append('tardinesscount', this.form.tardinesscount);
				formData.append('reliability', this.form.reliability);
				formData.append('agentsite', this.form.agentsite);
				formData.append('ngucc', this.form.ngucc);
				formData.append('ironman', this.form.ironman);
				formData.append('xavier', this.form.xavier);
				formData.append('crm', this.form.crm);
				axios.create({
					baseURL : this.apiUrl,
					headers : {
						'Authorization' : `Bearer ${this.token}`
					}
				})
				.post('/form/submit', formData)
				.then(function(res){

				});
			}
		},
	};
</script>