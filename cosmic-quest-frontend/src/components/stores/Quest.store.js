import { defineStore } from "pinia";
import { ref, computed } from "vue";
import axios from "axios";

export const useQuestStore = defineStore("quest", () => {
  const history = ref([]);
  const karma = ref(0);
  const loading = ref(false);
  const error = ref(null);

  const totalQuests = computed(() => history.value.length);
  const hasHistory = computed(() => history.value.length > 0);

  const loadFromStorage = () => {
    const savedHistory = localStorage.getItem("taskMasterHistory");
    const savedKarma = localStorage.getItem("taskMasterKarma");

    if (savedHistory) {
      try {
        history.value = JSON.parse(savedHistory);
      } catch (e) {
        console.error("Failed to load history:", e);
      }
    }

    if (savedKarma) {
      karma.value = parseInt(savedKarma) || 0;
    }
  };

  const saveToStorage = () => {
    localStorage.setItem("taskMasterHistory", JSON.stringify(history.value));
    localStorage.setItem("taskMasterKarma", karma.value.toString());
  };

  const generateQuest = async (task) => {
    loading.value = true;
    error.value = null;

    try {
      const response = await axios.post(
        "http://localhost:8000/api/boost",
        {
          task,
        },
        {
          timeout: 30000,
        }
      );

      const quest = {
        id: Date.now(),
        date: new Date(),
        task,
        result: response.data,
      };

      history.value.unshift(quest);
      karma.value += 1;
      saveToStorage();

      return quest;
    } catch (e) {
      error.value = e.response?.data?.error || "Une erreur est survenue";
      throw e;
    } finally {
      loading.value = false;
    }
  };

  const deleteQuest = (index) => {
    history.value.splice(index, 1);
    karma.value = Math.max(0, karma.value - 1);
    saveToStorage();
  };

  const clearHistory = () => {
    history.value = [];
    karma.value = 0;
    saveToStorage();
  };

  const exportHistory = () => {
    const data = JSON.stringify(history.value, null, 2);
    const blob = new Blob([data], { type: "application/json" });
    const url = URL.createObjectURL(blob);
    const a = document.createElement("a");
    a.href = url;
    a.download = `taskmaster-history-${Date.now()}.json`;
    a.click();
    URL.revokeObjectURL(url);
  };

  const searchHistory = (query) => {
    const lowerQuery = query.toLowerCase();
    return history.value.filter(
      (item) =>
        item.task.toLowerCase().includes(lowerQuery) ||
        item.result.quest.toLowerCase().includes(lowerQuery) ||
        item.result.compliment.toLowerCase().includes(lowerQuery) ||
        item.result.excuse.toLowerCase().includes(lowerQuery)
    );
  };

  loadFromStorage();

  return {
    history,
    karma,
    loading,
    error,
    totalQuests,
    hasHistory,
    generateQuest,
    deleteQuest,
    clearHistory,
    exportHistory,
    searchHistory,
    saveToStorage,
  };
});
