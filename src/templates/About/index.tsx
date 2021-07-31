import MainText from 'components/MainText'
import { NormalText } from 'components/NormalText/styles'
import { TitleText } from 'components/TitleText/styles'
import * as S from './styles'

const AboutTemplate = () => (
  <S.Content>
    <TitleText>
      Olá <br />
      I&apos;m Lucas
      <br />
      Sukeyosi.
    </TitleText>
    <NormalText>
      A Latin American self-taught designer, with a degree in economics.
    </NormalText>
    <MainText>
      You can say I’m a{' '}
      <S.Green>
        multidisciplinary Designer or an Economist specializing in finance,
        investment, and banking
      </S.Green>
      . Other than that I’m a garage musician, former national judo champion,
      always a curious and wandering learner. An avid defender of doing things
      with love, honesty, and authenticity – producing and serving humanity,
      always with a purpose.
    </MainText>
  </S.Content>
)

export default AboutTemplate
