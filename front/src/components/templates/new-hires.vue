<template>
	<v-card flat>
		<v-card-title>
			<v-list-item-title class="headline mb-1">JFC NEW HIRES TRACKING TAB</v-list-item-title>
		</v-card-title>
		<v-card-text style="overflow-y:auto; width: 94%">
			<table class="v-datatable v-table" style="width:100%;border-collapse:collapse">
				<thead>
					<tr>
						<th>FIRST NAME</th>
						<th>MIDDLE NAME</th>
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
			</table>
		</v-card-text>
	</v-card>
</template>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
td{
  border: 1px solid #007ac0;
  text-align: center;
  padding: 8px;
  width:100%;
}
th {
  border: 1px solid #007ac0;
  text-align: center;
  padding: 8px;
  width:100%;
  background-color: #2f74b5;
  color: #fff;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>