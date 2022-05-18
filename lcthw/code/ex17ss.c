// /*this is a header file to deal with input output streams*/
// #include <stdio.h>
// // header file to deal with optional arguments
// #include <stdarg.h>
// /*create a function named foo that takes a char pointer, and optional parameters*/
// void foo(char *fmt, ...)
// {
//   // function foo declares and initializes a va_list which the header file defines to use to step through a list of variable arguments
//   va_list ap;
//   // declare an integer variable d
//   int d;
//   // declare a char and a pointer of type char named s
//   char c, *s;
//   // it initializes the va_list ap, last known argument is the second parameter
//   va_start(ap, fmt);
//   // while there is a last argument.
//    while (*fmt)
//        // increment the pointer after the switch statement evaluation
//        switch(*fmt++) {
//        case 's':           /* string */
//            s = va_arg(ap, char *);
//          printf("string %s//n", s);
//            break;
//        case 'd':           /* int */
//            d = va_arg(ap, int);
//            printf("int %d//n", d);
//            break;
//       case 'c':           /* char */
//            /* need a cast here since va_arg only
//               takes fully promoted types */
//           c = (char) va_arg(ap, int);
//           printf("char %c//n", c);

//           break;
//
//        }
//     va_end(ap);
// }
//
// int main(int argc, char *argv[]) {

//     foo("c", 50);
//
// }
// // has a function named foo that returns nothing and takes a char pointer.



// C program for array implementation of stack
// a header file that contains size limits for data types
// #include <limits.h>
// a header file that deals with file input out streams
// #include <stdio.h>
// a header file that deals with convert char pointers
// #include <stdlib.h>

// A structure to represent a stack
// struct Stack {
//     int top;
//     unsigned capacity;
//     int *array;
// };
//
// // function to create a stack of given capacity. It initializes size of
// // stack as 0
// struct Stack *createStack(unsigned capacity)
// {
//     struct Stack *stack = (struct Stack *)malloc(sizeof(struct Stack));
//     stack->capacity = capacity;
//     stack->top = -1;
//     stack->array = (int *)malloc(stack->capacity * sizeof(int));
//     return stack;
// }
//
// // Stack is full when top is equal to the last index
// int isFull(struct Stack *stack)
// {
//     return stack->top == stack->capacity - 1;
// }
//
// // Stack is empty when top is equal to -1
// int isEmpty(struct Stack *stack)
// {
//     return stack->top == -1;
// }
//
// // Function to add an item to stack.  It increases top by 1
// void push(struct Stack *stack, int item)
// {
//     if (isFull(stack))
//         return;
//     stack->array[++stack->top] = item;
//     printf("%d pushed to stackn", item);
// }
//
// // Function to remove an item from stack.  It decreases top by 1
// int pop(struct Stack *stack)
// {
//     if (isEmpty(stack))
//         return INT_MIN;
//     return stack->array[stack->top--];
// }
//
// // Function to return the top from stack without removing it
// int peek(struct Stack *stack)
// {
//     if (isEmpty(stack))
//         return INT_MIN;
//     return stack->array[stack->top];
// }
//
// // Driver program to test above functions
// int main()
// {
//     struct Stack *stack = createStack(100);
//
//     push(stack, 10);
//     push(stack, 20);
//     push(stack, 30);
//
//     printf("%d popped from stackn", pop(stack));
//
//     return 0;
// }

// C program for linked list implementation of stack
#include <limits.h>
#include <stdio.h>
#include <stdlib.h>

// A structure to represent a stack
struct StackNode {
    int data;
    struct StackNode *next;
};

struct StackNode *newNode(int data)
{
    struct StackNode *stackNode = (struct StackNode *)malloc(sizeof(struct StackNode));
    stackNode->data = data;
    stackNode->next = NULL;
    return stackNode;
}

int isEmpty(struct StackNode *root)
{
    return !root;
}

void push(struct StackNode **root, int data)
{
    struct StackNode *stackNode = newNode(data);
    stackNode->next = *root;
    *root = stackNode;
    printf("[%d] pushed to stack\n", data);
}

int pop(struct StackNode **root)
{
    if (isEmpty(*root))
        return INT_MIN;
    struct StackNode *temp = *root;
    *root = (*root)->next;
    int popped = temp->data;
    free(temp);

    return popped;
}

int peek(struct StackNode *root)
{
    if (isEmpty(root))
        return INT_MIN;
    return root->data;
}

void print(struct StackNode **root)
{
    struct StackNode *temp = *root;
    printf("List is: ");
    while(temp != NULL)
    {
        printf(" %d", temp->data);
        temp = temp->next;
    }
    printf("\n");
    free(temp);
}

int main()
{
    struct StackNode *root = NULL;

    printf("How many numbers?\n");
    int n, i, x;
    scanf("%d", &n);
    for(i = 0; i < n; i++) {
      printf("Enter the number \n");
      scanf("%d", &x);
      push(&root, x);
      print(&root);
    }

    printf("%d popped from stack\n", pop(&root));
    printf("%d popped from stack\n", pop(&root));


    printf("Top element is %d\n", peek(root));

    return 0;
}
