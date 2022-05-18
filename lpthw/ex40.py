class Song(object):

    def __init__(self, lyrics):
        self.lyrics = lyrics

    def sing_me_a_song(self):
        for line in self.lyrics:
            print(line)



happy_bday = Song(["Happy Birthday to you",
                   "I don't won't to get sued",
                   "So I'll stop right there."])

bulls_on_parade = Song(["They rally around the family",
                       "With pockets full of shells"])

meek = ["Never let them lock your mind in a Bubble",
        "Locked up behind some stupid shit.",
        "You're going to want to rumble."]

meek_mill = Song(meek)


hov = ["You will never be enough.",
       "Let's just keep it real",
       "Jay-Z"]

jay_z = Song(hov)



happy_bday.sing_me_a_song()

bulls_on_parade.sing_me_a_song()

print('*' * 10)

meek_mill.sing_me_a_song()

jay_z.sing_me_a_song()
