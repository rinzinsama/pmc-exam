<template>
  <div class="row">
    <div class="q-pa-md col">
      <div class="text-h5">Add Task</div>
      <q-form @submit.prevent="addTask">
        <q-input class=" q-ma-xs" dense filled v-model="newTask.name" label="Task Name" />
        <q-select class=" q-ma-xs" dense filled v-model="newTask.difficulty" :options="difficultyLevels"
          label="Difficulty" />
        <q-select class=" q-ma-xs" dense filled v-model="newTask.assignee" :options="users" label="Assign To" />
        <q-btn class=" q-ma-xs float-right " color="primary" type="submit" label="Create Task" />
      </q-form>
    </div>
  </div>
  <div class="row">
    <div class="q-pa-md col">
      <q-table :rows="tasks" :columns="columns" row-key="id">
        <template v-slot:top-right="{ refresh }">
          <q-btn label="Refresh" @click="refresh" />
        </template>
      </q-table>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      newTask: {
        name: "",
        difficulty: "",
        assignee: "",
      },
      difficultyLevels: [
        { label: "Easy", value: "easy" },
        { label: "Medium", value: "medium" },
        { label: "Hard", value: "hard" },
      ],
      users: [
        { label: "John Doe", value: "john.doe" },
        { label: "Jane Doe", value: "jane.doe" },
        { label: "Bob Smith", value: "bob.smith" },
      ],
      tasks: [{
        id: 1,
        name: "Task 1",
        difficulty: "easy",
        assignee: "John Doe",
        created_at: "2023-05-08T08:00:00Z",
      },
      {
        id: 2,
        name: "Task 2",
        difficulty: "medium",
        assignee: "Jane Doe",
        created_at: "2023-05-09T10:00:00Z",
      },
      {
        id: 3,
        name: "Task 3",
        difficulty: "hard",
        assignee: "Bob Smith",
        created_at: "2023-05-09T12:00:00Z",
      },],
      columns: [
        {
          name: "name",
          required: true,
          label: "Task Name",
          align: "left",
          field: "name",
        },
        {
          name: "difficulty",
          required: true,
          label: "Difficulty",
          align: "left",
          field: "difficulty",
        },
        {
          name: "assignee",
          required: true,
          label: "Assignee",
          align: "left",
          field: "assignee",
        },
        {
          name: "created_at",
          required: true,
          label: "Created At",
          align: "left",
          field: "created_at",
        },
      ],
    };
  },

  methods: {
    addTask() {
      // Here you can add the new task to your database or state management system
      console.log(this.newTask);

      // Reset the form fields
      this.newTask.name = "";
      this.newTask.difficulty = "";
      this.newTask.assignee = "";
    },
    fetchDifficultyLevels() {
      axios
        .get("/api/difficulty-levels")
        .then((response) => {
          this.difficultyLevels = response.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },


  },
};
</script>
