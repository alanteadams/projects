#from sys import argv
#script, sentence = argv

lexicon = {
    "north": 'direction',
    "south": 'direction',
    "east": 'direction',
    "west": 'direction',
    "go": 'verb',
    "kill": 'verb',
    "eat": 'verb',
    "the": 'stop',
    "of": 'stop',
    "in": 'stop',
    "bear": 'noun',
    "princess": 'noun',
}


def scan(sentence):
#    print(">>>>>>>>>>you called me")
    results = []
    words = sentence.split()
    for word in words:
#            print(">>>>>>>>>>>>>entering the for loop")
        if word.isdigit():

#                print(">>>>>isdigit")
            word = int(word)

            results.append(('number', word))
        elif word not in lexicon:
#                print(">>>>>>>>not in lexicon buddy")
            results.append(('error', word))
        else:
#                print(">>>>>>>>>You must be in the lexicon")
            word_type = lexicon.get(word)
            results.append((word_type, word))
#                print(">>>>>>>>>>>>>>>>>>>Leaving the loop")
    return results


#g = scan(sentence)
#print(g)
