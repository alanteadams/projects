#!/usr/bin/env python
# -*- coding: utf-8 -*-

class Stack:
    def __init__(self):
        self.nodes = []

    def push(self, value):
        self.nodes.append(value)

    def pop(self):
        return self.nodes.pop()

    def is_empty(self):
        return self.size() == 0

    def size(self):
        return len(self.nodes)

stack = Stack()
stack.push(1)
stack.push(2)
stack.push(3)

while not stack.is_empty():
    print(stack.pop())
