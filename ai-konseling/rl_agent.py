import json
import os
import random

class QLearningAgent:
    def __init__(self, filename="q_table.json", alpha=0.1, gamma=0.9, epsilon=0.2):
        self.states = ["Hijau", "Kuning", "Merah"]
        self.actions = ["validasi", "cbt", "eksplorasi"]
        self.filename = filename
        self.alpha = alpha
        self.gamma = gamma
        self.epsilon = epsilon
        self.q_table = self.load_q_table()

    def load_q_table(self):
        if os.path.exists(self.filename):
            try:
                with open(self.filename, 'r') as f:
                    return json.load(f)
            except:
                pass
        
        # Initialize Q-table
        table = {}
        for state in self.states:
            table[state] = {action: 0.0 for action in self.actions}
        return table

    def save_q_table(self):
        with open(self.filename, 'w') as f:
            json.dump(self.q_table, f, indent=4)

    def choose_action(self, state):
        if state not in self.q_table:
            return "validasi"
            
        if random.uniform(0, 1) < self.epsilon:
            return random.choice(self.actions) # Explore
        else:
            # Exploit best action
            best_action = max(self.q_table[state], key=self.q_table[state].get)
            return best_action

    def update(self, state, action, reward, next_state):
        if state not in self.q_table or next_state not in self.q_table:
            return
            
        current_q = self.q_table[state][action]
        max_next_q = max(self.q_table[next_state].values())
        new_q = current_q + self.alpha * (reward + self.gamma * max_next_q - current_q)
        self.q_table[state][action] = new_q
        self.save_q_table()
