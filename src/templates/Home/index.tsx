import Image from 'next/image'
import MainText from 'components/MainText'
import NormalText from 'components/NormalText'
import TitleText from 'components/TitleText'
import * as S from './styles'
import HeroImage from '../../../public/img/heroimage.jpg'

export default function HomeTemplate() {
  return (
    <>
      <S.IntroWrapper>
        <Image
          alt="Heroimage"
          src={HeroImage}
          layout="responsive"
          width={2300}
          height={1294}
        />
      </S.IntroWrapper>
      <S.HomeWrapper>
        <TitleText>
          Olá
          <br />
          I´m Lucas
          <br />
          Sukeyosi
        </TitleText>
        <NormalText>
          A Latin American self-taught designer, with a degree in economics.
        </NormalText>
        <MainText>
          You can say I’m a
          <S.Green>
            multidisciplinary Designer or an Economist specializing in finance,
            investment, and banking
          </S.Green>
          . Other than that I’m a garage musician, former national judo
          champion, always a curious and wandering learner. An avid defender of
          doing things with love, honesty, and authenticity – producing and
          serving humanity, always with a purpose.
        </MainText>
      </S.HomeWrapper>
    </>
  )
}
