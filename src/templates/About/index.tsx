import * as S from './styles'

export type AboutTemplateProps = {
  headingDesign: string
  textDesign: string
  //   aboutPhoto: string
  aboutDescription: string
  headingEconomist: string
  textEconomist: string
  briefEconomist: string
  aboutExpertise: string
  descriptionExpertise: string
  aboutSharping: string
  descriptionSharping: string
  getInTouch: string
}

const AboutTemplate = ({
  headingDesign,
  textDesign,
  //   aboutPhoto,
  aboutDescription,
  headingEconomist,
  textEconomist,
  briefEconomist,
  aboutExpertise,
  descriptionExpertise,
  aboutSharping,
  descriptionSharping,
  getInTouch
}: //get in Touch necessário encapsular e adicionar como component
AboutTemplateProps) => (
  <S.Content>
    <S.HeadingDesign>{headingDesign}</S.HeadingDesign>
    <S.textDesign>
      <div dangerouslySetInnerHTML={{ __html: textDesign }} />
    </S.textDesign>
    {/* <S.aboutPhoto>{aboutPhoto}</S.aboutPhoto> */}
    <S.aboutDescription>{aboutDescription}</S.aboutDescription>
    <S.headingEconomist>{headingEconomist}</S.headingEconomist>
    <S.textEconomist>
      <div dangerouslySetInnerHTML={{ __html: textEconomist }} />
    </S.textEconomist>
    <S.briefEconomist>{briefEconomist}</S.briefEconomist>
    <S.aboutExpertise>{aboutExpertise}</S.aboutExpertise>
    <S.descriptionExpertise>{descriptionExpertise}</S.descriptionExpertise>
    <S.aboutSharping>{aboutSharping}</S.aboutSharping>
    <S.descriptionExpertise>{descriptionSharping}</S.descriptionExpertise>
    <S.getInTouch>{getInTouch}</S.getInTouch>
  </S.Content>
)

export default AboutTemplate
