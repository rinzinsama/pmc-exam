<template>
  <div class="row">
    <div class="q-pa-md col">
      <div class="text-h5">Add User</div>
      <q-form>
        <q-input class=" q-ma-xs" dense filled v-model="newItem.name" label="Name" />
        <q-input class=" q-ma-xs" dense filled v-model="newItem.email" label="Email" v-if="newItem.type === 'user'" />
        <q-select class=" q-ma-xs" dense filled v-model="newItem.role" :options="roles" label="Role"
          v-if="newItem.type === 'user'" />
        <q-input class=" q-ma-xs" dense filled v-model="newItem.department" label="Department"
          v-if="newItem.type === 'user'" />
        <q-select class=" q-ma-xs" dense filled v-model="newItem.type" :options="itemTypes" label="Type" />
        <q-btn class=" q-ma-xs float-right " color="primary" @click="addUserOrRole" label="Add Item" />
      </q-form>

    </div>
  </div>
  <div class="row">
    <div class="q-pa-md col"><q-table :rows="items" :columns="columns" row-key="id" /></div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      items: [
        { id: 1, name: "John Doe", email: "john.doe@example.com", role: "Developer", department: "Engineering", type: "user" },
        { id: 2, name: "Marketing", role: "Marketing Manager", type: "role" },
        { id: 3, name: "Jane Doe", email: "jane.doe@example.com", role: "QA Analyst", department: "Engineering", type: "user" },
        { id: 4, name: "Engineering", role: "Engineering Manager", type: "role" },
      ],
      columns: [
        { name: "Name", field: "name", label: "Name", align: "left" },
        { name: "Email", field: "email", visible: false, label: "Email", align: "left" },
        { name: "Role", field: "role", visible: false, label: "Role", align: "left" },
        { name: "Department", field: "department", visible: false, label: "Department", align: "left" },
        { name: "Type", field: "type", label: "Type" },
      ],
      newItem: {
        name: "",
        email: "",
        role: "",
        department: "",
        type: "user",
      },
      itemTypes: [
        { label: "User", value: "user" },
        { label: "Role", value: "role" },
      ],
      roles: [
        { label: "Developer", value: "Developer" },
        { label: "QA Analyst", value: "QA Analyst" },
        { label: "Marketing Manager", value: "Marketing Manager" },
        { label: "Engineering Manager", value: "Engineering Manager" },
      ],
    };
  },
  methods: {
    addUserOrRole() {
      const newId = this.items.length + 1;
      this.items.push({ id: newId, ...this.newItem });
      this.newItem.name = "";
      this.newItem.email = "";
      this.newItem.role = "";
      this.newItem.department = "";
      this.newItem.type = "user";
    },
  },
};
</script>
